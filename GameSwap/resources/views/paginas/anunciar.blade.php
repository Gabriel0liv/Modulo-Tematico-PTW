<x-layout>
    <div class="max-w-3xl mx-auto bg-white rounded-lg shadow-md p-6">
        <div class="flex items-center mb-6">
            <i data-lucide="tag" class="h-6 w-6 text-primary mr-2"></i>
            <h1 class="text-2xl font-bold text-text">Anunciar Produto</h1>
        </div>

        <div class="bg-blue-50 border-l-4 border-primary p-4 mb-6 rounded-r-lg">
            <div class="flex">
                <i data-lucide="info" class="h-5 w-5 text-primary mr-2"></i>
                <div>
                    <p class="text-sm text-primary-600">Anuncie seu jogo ou console em poucos passos. Produtos com fotos de qualidade vendem até 3x mais rápido!</p>
                </div>
            </div>
        </div>

        <form id="formPublicar" class="space-y-6" action="{{ route('produtos.store') }}" method="POST">
            @csrf
            <!-- Token CSRF obrigatório para segurança -->
            <!-- Product Photos -->
            <div>
                <label class="block text-text font-medium mb-2">Fotos do Produto</label>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="border-2 border-dashed border-gray-300 rounded-lg p-4 flex flex-col items-center justify-center h-40 cursor-pointer hover:bg-gray-50 transition relative photo-upload">
                        <div class="absolute top-2 left-2 bg-primary text-white text-xs px-2 py-1 rounded">
                            Principal
                        </div>
                        <i data-lucide="image-plus" class="h-10 w-10 text-gray-400 mb-2"></i>
                        <span class="text-sm text-gray-500">Adicionar foto principal</span>
                        <input type="file" class="hidden" accept="image/*" />
                    </div>
                    <div class="border-2 border-dashed border-gray-300 rounded-lg p-4 flex flex-col items-center justify-center h-40 cursor-pointer hover:bg-gray-50 transition photo-upload">
                        <i data-lucide="image-plus" class="h-10 w-10 text-gray-400 mb-2"></i>
                        <span class="text-sm text-gray-500">Adicionar foto</span>
                        <input type="file" class="hidden" accept="image/*" />
                    </div>
                    <div class="border-2 border-dashed border-gray-300 rounded-lg p-4 flex flex-col items-center justify-center h-40 cursor-pointer hover:bg-gray-50 transition photo-upload">
                        <i data-lucide="image-plus" class="h-10 w-10 text-gray-400 mb-2"></i>
                        <span class="text-sm text-gray-500">Adicionar foto</span>
                        <input type="file" class="hidden" accept="image/*" />
                    </div>
                </div>
                <p class="text-sm text-gray-500 mt-2 flex items-center">
                    <i data-lucide="info" class="h-4 w-4 mr-1"></i>
                    Adicione até 6 fotos do seu produto. A primeira foto será a capa do anúncio.
                </p>
            </div>

            <!-- Product Name -->
            <div>
                <label for="product-name" class="block text-text font-medium mb-2">Nome do Produto</label>
                <input type="text" id="product-name" name="nome" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary" placeholder="Ex: PlayStation 5" required />
                <p class="text-xs text-gray-500 mt-1">Seja específico. Inclua detalhes como marca, modelo e edição.</p>
            </div>

            <!-- Product Price -->
            <div>
                <label for="product-price" class="block text-text font-medium mb-2">Preço do Produto</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <span class="text-gray-500">R$</span>
                    </div>
                    <input type="number" id="product-price" name="preco" class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary" placeholder="0,00" step="0.01" min="0" required />
                </div>
                <div class="mt-2 flex items-center">
                    <div class="flex-1">
                        <p class="text-xs text-gray-500">Preço médio de mercado: <span class="text-primary font-medium">R$ 250,00 - R$ 350,00</span></p>
                    </div>
                    <div class="flex items-center">
                        <input type="checkbox" id="accept-offers" class="mr-2" />
                        <label for="accept-offers" class="text-sm text-gray-600">Aceito ofertas</label>
                    </div>
                </div>
            </div>

            <!-- Product Condition -->
            <div>
                <label class="block text-text font-medium mb-2">Estado do Produto</label>
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
                    <div>
                        <input type="radio" id="condition-new" name="estado" value="novo" class="hidden peer" required checked />
                        <label for="condition-new" class="flex items-center justify-center p-3 text-gray-500 bg-white border border-gray-300 rounded-lg cursor-pointer peer-checked:border-primary peer-checked:bg-primary/10 peer-checked:text-primary hover:bg-gray-50">
                            <i data-lucide="package" class="h-4 w-4 mr-2"></i>
                            Novo
                        </label>
                    </div>
                    <div>
                        <input type="radio" id="condition-used" name="estado" value="usado" class="hidden peer" />
                        <label for="condition-used" class="flex items-center justify-center p-3 text-gray-500 bg-white border border-gray-300 rounded-lg cursor-pointer peer-checked:border-primary peer-checked:bg-primary/10 peer-checked:text-primary hover:bg-gray-50">
                            <i data-lucide="package-open" class="h-4 w-4 mr-2"></i>
                            Usado
                        </label>
                    </div>
                    <div>
                        <input type="radio" id="condition-refurbished" name="estado" value="recondicionado" class="hidden peer" />
                        <label for="condition-refurbished" class="flex items-center justify-center p-3 text-gray-500 bg-white border border-gray-300 rounded-lg cursor-pointer peer-checked:border-primary peer-checked:bg-primary/10 peer-checked:text-primary hover:bg-gray-50">
                            <i data-lucide="package-check" class="h-4 w-4 mr-2"></i>
                            Recondicionado
                        </label>
                    </div>
                </div>
            </div>

            <!-- Game Category -->
            <div>
                <label for="game-category" class="block text-text font-medium mb-2">Categoria de Jogo</label>
                <select id="game-category" name="id_categoria" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary" required>
                    <option value="" disabled selected>Selecione uma categoria</option>
                    @foreach($categorias as $categoria)
                    <option value="{{$categoria->id}}">{{$categoria->nome}}</option>
                    @endforeach
                </select>
                <p class="text-xs text-gray-500 mt-1">Escolha a categoria que melhor descreve seu jogo.</p>
            </div>

            <!-- Product Description -->
            <div>
                <label for="product-description" class="block text-text font-medium mb-2">Descrição do Produto</label>
                <textarea id="product-description" name="descricao" rows="4" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary" placeholder="Descreva o produto, mencione detalhes importantes como tempo de uso, acessórios incluídos, etc." required></textarea>
                <div class="flex justify-between mt-1">
                    <p class="text-xs text-gray-500">Seja detalhado e honesto sobre o estado do produto.</p>
                    <p class="text-xs text-gray-500"><span id="char-count">0</span>/1000 caracteres</p>
                </div>
            </div>

            <!-- Console Type -->
            <div>
                <label for="console-type" class="block text-text font-medium mb-2">Tipo de Console</label>
                <select id="console-type" name="console" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary" required>
                    <option value="" disabled selected>Selecione um console</option>
                    <option value="ps5">PlayStation 5</option>
                    <option value="ps4">PlayStation 4</option>
                    <option value="ps3">PlayStation 3</option>
                    <option value="xbox-series">Xbox Series X/S</option>
                    <option value="xbox-one">Xbox One</option>
                    <option value="xbox-360">Xbox 360</option>
                    <option value="switch">Nintendo Switch</option>
                    <option value="wii">Nintendo Wii/Wii U</option>
                    <option value="pc">PC</option>
                    <option value="outro">Outro</option>
                </select>
            </div>

            <!-- Delivery Options -->
            <div>
                <label class="block text-text font-medium mb-2">Opções de Entrega</label>
                <div class="space-y-2">
                    <div class="flex items-center">
                        <input type="checkbox" id="delivery-mail" class="mr-2" checked />
                        <label for="delivery-mail" class="text-sm text-gray-600">Envio pelos Correios</label>
                    </div>
                    <div class="flex items-center">
                        <input type="checkbox" id="delivery-pickup" class="mr-2" checked />
                        <label for="delivery-pickup" class="text-sm text-gray-600">Retirada em mãos</label>
                    </div>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="flex justify-end">
                <button type="submit" class="bg-primary text-black px-6 py-3 rounded-lg font-medium hover:bg-primary/90 transition flex items-center">
                    <i data-lucide="check-circle" class="h-5 w-5 mr-2"></i>
                    Publicar Anúncio
                </button>
            </div>
        </form>
    </div>


    <script>
        document.addEventListener('DOMContentLoaded', function() {

            const form = document.getElementById("formPublicar"); // Seleciona o formulário principal
            //alert(form.innerHTML);
            const productName = document.getElementById("product-name"); // Campo do nome do produto
            const productPrice = document.getElementById("product-price"); // Campo do preço do produto
            const gameCategory = document.getElementById("game-category"); // Campo da categoria do jogo
            const productDescription = document.getElementById("product-description"); // Campo da descrição do produto
            const consoleType = document.getElementById("console-type"); // Campo do tipo de console

            // Adiciona um evento de validação ao enviar o formulário
            form.addEventListener("submit", function(event) {
                //event.preventDefault(); // Impede o envio padrão do formulário

                let isValid = true; // Flag para rastrear se o formulário é válido

                // Validação do nome do produto
                if (productName.value.trim() === "") {
                    alert("O nome do produto é obrigatório.");
                    productName.focus();
                    isValid = false;
                } else if (productName.value.length < 3) {
                    alert("O nome do produto deve ter pelo menos 3 caracteres.");
                    productName.focus();
                    isValid = false;
                }

                // Validação do preço do produto
                if (productPrice.value.trim() === "") {
                    alert("O preço do produto é obrigatório.");
                    productPrice.focus();
                    isValid = false;
                } else if (
                    isNaN(productPrice.value) ||
                    parseFloat(productPrice.value) <= 0
                ) {
                    alert("Insira um preço válido maior que zero.");
                    productPrice.focus();
                    isValid = false;
                }

                // Validação da categoria do jogo
                if (gameCategory.value === "") {
                    alert("Selecione uma categoria de jogo.");
                    gameCategory.focus();
                    isValid = false;
                }

                // Validação da descrição do produto
                if (productDescription.value.trim() === "") {
                    alert("A descrição do produto é obrigatória.");
                    productDescription.focus();
                    isValid = false;
                } else if (productDescription.value.length > 1000) {
                    alert("A descrição do produto não pode exceder 1000 caracteres.");
                    productDescription.focus();
                    isValid = false;
                }

                // Validação do tipo de console
                if (consoleType.value === "") {
                    alert("Selecione um tipo de console.");
                    consoleType.focus();
                    isValid = false;
                }

                // Impede o envio do formulário se alguma validação falhar
                if (!isValid) {
                    event.preventDefault();
                }
            });

            //  alidação em tempo real para o campo de preço (apenas números e ponto decimal)
            productPrice.addEventListener("input", function() {
                this.value = this.value.replace(/[^0-9.]/g, ""); // Remove caracteres inválidos
            });

            // Validação em tempo real para o campo de descrição (limite de caracteres)
            productDescription.addEventListener("input", function() {
                const count = this.value.length;
                const charCount = document.getElementById("char-count");
                charCount.textContent = count;

                if (count > 1000) {
                    charCount.classList.add("text-red-500", "font-bold");
                } else {
                    charCount.classList.remove("text-red-500", "font-bold");
                }
            });

            // Character counter for description
            const descriptionField = document.getElementById("product-description");
            const charCount = document.getElementById("char-count");

            // Make the file upload areas clickable
            document.querySelectorAll(".photo-upload").forEach((area) => {
                area.addEventListener("click", () => {
                    area.querySelector('input[type="file"]').click();
                });

                const fileInput = area.querySelector('input[type="file"]');
                fileInput.addEventListener("change", (e) => {
                    if (e.target.files.length > 0) {
                        // Show preview of the image
                        const file = e.target.files[0];
                        const reader = new FileReader();

                        reader.onload = function(event) {
                            // Replace the icon with the image preview
                            const isMain = area.querySelector(".top-2") !== null;
                            let mainTag = "";

                            if (isMain) {
                                mainTag = `<div class="absolute top-2 left-2 bg-primary text-white text-xs px-2 py-1 rounded">
                    Principal
                  </div>`;
                            }

                            area.innerHTML = `
                  <div class="relative w-full h-full">
                    ${mainTag}
                    <img src="${event.target.result}" class="w-full h-full object-cover rounded-lg" />
                    <button type="button" class="absolute top-2 right-2 bg-white rounded-full p-1 shadow-md remove-image">
                      <i data-lucide="x" class="h-4 w-4 text-gray-500"></i>
                    </button>
                    <input type="file" class="hidden" accept="image/*" />
                  </div>
                `;

                            // Re-initialize icons
                            lucide.createIcons();

                            // Add event listener to remove button
                            area.querySelector(".remove-image").addEventListener(
                                "click"
                                , (e) => {
                                    e.stopPropagation();

                                    // Restore original content
                                    if (isMain) {
                                        area.innerHTML = `
                      <div class="absolute top-2 left-2 bg-primary text-white text-xs px-2 py-1 rounded">
                        Principal
                      </div>
                      <i data-lucide="image-plus" class="h-10 w-10 text-gray-400 mb-2"></i>
                      <span class="text-sm text-gray-500">Adicionar foto principal</span>
                      <input type="file" class="hidden" accept="image/*" />
                    `;
                                    } else {
                                        area.innerHTML = `
                      <i data-lucide="image-plus" class="h-10 w-10 text-gray-400 mb-2"></i>
                      <span class="text-sm text-gray-500">Adicionar foto</span>
                      <input type="file" class="hidden" accept="image/*" />
                    `;
                                    }

                                    lucide.createIcons();

                                    // Re-add click event to the area
                                    area.addEventListener("click", () => {
                                        area.querySelector(
                                            'input[type="file"]'
                                        ).click();
                                    });
                                }
                            );
                        };

                        reader.readAsDataURL(file);
                    }
                });
            });

        });

        // Initialize Lucide icons
        //lucide.createIcons();

    </script>
</x-layout>
