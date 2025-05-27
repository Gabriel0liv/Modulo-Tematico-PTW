<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Customer;
use Stripe\SetupIntent;
use App\Models\PaymentMethod;

class StripeController extends Controller
{
    public function createSetupIntent()
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));

        $user = auth()->user();

        if (!$user->stripe_customer_id) {
            $customer = Customer::create([
                'email' => $user->email,
                'name'  => $user->name,
            ]);

            $user->stripe_customer_id = $customer->id;
            $user->save();
        }

        $intent = SetupIntent::create([
            'customer' => $user->stripe_customer_id,
        ]);

        return response()->json([
            'clientSecret' => $intent->client_secret,
            'stripeKey'    => env('STRIPE_KEY'),
        ]);
    }

    public function storePaymentMethod(Request $request)
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));

        $user = auth()->user();
        $paymentMethodId = $request->input('payment_method');

        // Anexa no Stripe
        \Stripe\PaymentMethod::retrieve($paymentMethodId)
            ->attach(['customer' => $user->stripe_customer_id]);

        // Salva localmente
        $isFirst = $user->paymentMethods()->count() === 0;

        PaymentMethod::create([
            'user_id' => $user->id,
            'stripe_payment_method_id' => $paymentMethodId,
            'is_default' => $isFirst,
        ]);

        return response()->json(['message' => 'Cartão salvo com sucesso!']);
    }

    public function storePaymentMethodForm(Request $request)
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));

        $user = auth()->user();
        $paymentMethod = auth()->user()->paymentMethods();
        $paymentMethodId = $request->input('payment_method');



        if (!$paymentMethodId) {
            return redirect()->back()->withErrors(['payment_method' => 'Falha ao adicionar cartão.']);
        }

        \Stripe\PaymentMethod::retrieve($paymentMethodId)
            ->attach(['customer' => $user->stripe_customer_id]);

        $isFirst = $user->paymentMethods()->count() === 0;

        PaymentMethod::create([
            'nome_cartao' => $request->input('nome_cartao'),
            'user_id' => $user->id,
            'stripe_payment_method_id' => $paymentMethodId,
            'is_default' => $isFirst,
        ]);

        if ($isFirst) {
            \Stripe\Customer::update($user->stripe_customer_id, [
                'invoice_settings' => [
                    'default_payment_method' => $paymentMethodId,
                ],
            ]);
        }

        return redirect()->route('perfil-cartões')->with('success', 'Cartão salvo com sucesso!');
    }

    public function setDefaultCard($id)
    {
        $user = auth()->user();
        $method = PaymentMethod::where('user_id', $user->id)->findOrFail($id);

        PaymentMethod::where('user_id', $user->id)->update(['is_default' => false]);

        \Stripe\Customer::update($user->stripe_customer_id, [
            'invoice_settings' => [
                'default_payment_method' => $method->stripe_payment_method_id,
            ],
        ]);

        $method->is_default = true;
        $method->save();

        return back()->with('success', 'Cartão padrão atualizado!');
    }

    public function listarCartoes()
    {
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        $user = auth()->user();
        $cartoesSalvos = $user->paymentMethods;

        $cartoesDetalhados = [];

        foreach ($cartoesSalvos as $cartao) {
            $stripeCard = \Stripe\PaymentMethod::retrieve($cartao->stripe_payment_method_id);

            $cartoesDetalhados[] = (object) [
                'id' => $cartao->id,
                'brand' => $stripeCard->card->brand,
                'last4' => $stripeCard->card->last4,
                'exp_month' => $stripeCard->card->exp_month,
                'exp_year' => $stripeCard->card->exp_year,
                'nome_cartao' => $cartao->nome_cartao,
                'is_default' => $cartao->is_default,
            ];
        }

        return view('paginas.perfil.perfilcartoes', [
            'cartoes' => $cartoesDetalhados
        ]);
    }

}
