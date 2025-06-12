<x-layout>
    <div class="max-w-4xl mx-auto p-5 mt-10">
        <div class="mb-6">
            <h3 class="text-2xl font-bold text-gray-900">Detalhes da Compra</h3>
        </div>

        <!-- Purchase Details Content -->
        <div id="purchaseDetailsContent" class="space-y-6">
            <div class="grid grid-cols-1 gap-6">
                <!-- Purchase Information -->
                <div class="bg-gray-50 rounded-lg p-6">
                    <h4 class="text-lg font-semibold text-gray-900 mb-4">Informações da Compra</h4>
                    <div class="space-y-3">
                        <div class="flex justify-between">
                            <span class="text-gray-500">ID da Compra:</span>
                            <span class="font-medium">{{$compra->id}}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-500">Data:</span>
                            <span class="font-medium">{{$compra->created_at}}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-500">Status:</span>
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{$purchase->statusClass ?? ''}}">{{$compra->status}}</span>
                        </div>
                        <div class="flex justify-between text-lg">
                            <span class="text-gray-500">Total:</span>
                            <span class="font-bold text-green-600">{{$compra->total}}</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Items Purchased -->
            <div class="bg-white border border-gray-200 rounded-lg">
                <div class="px-6 py-4 border-b border-gray-200">
                    <h4 class="text-lg font-semibold text-gray-900">Itens Comprados</h4>
                </div>
                <div class="divide-y divide-gray-200">
                    @foreach($items as $item)
                        <div class="p-6 flex items-center justify-between">
                            <div class="flex items-center space-x-4">
                                <div class="h-10 w-10 bg-gray-300 rounded overflow-hidden">
                                    <img src="{{$item->produto()->imagens->first() ? \App\Helpers\GoogleDriveHelper::transformGoogleDriveUrl($item->produto()->imagens->first()->path ?? $item->produto()->imagens->first()->caminho) : '/placeholder.svg' }}" alt="Produto" class="w-full h-full object-cover">
                                </div>
                                <div>
                                    <h5 class="font-medium text-gray-900">{{$item->produto()->nome}}</h5>
                                </div>
                            </div>
                            <span class="font-bold text-green-600">€ {{$item->preco_unitario}}</span>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-layout>
