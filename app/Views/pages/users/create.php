<?php $this->layout('layout', ['title' => $title]);?>

<div class="section">
    <h3>Criar de usuario</h3>

    <div class="form-control">

        <form action="/user/store" method="post" class="form-horizontal">
            <div class="row">
                <div class="mb-3">
                    <label for="name" class="form-label">Nome</label>
                    <input type="text" id="name" name="name" class="form-control" placeholder="Nome" />

                </div>
            </div>

            <div class="row">
                <div class="mb-3">
                    <label for="login" class="form-label">E-mail</label>
                    <input type="text" id="login" name="login" class="form-control" placeholder="E-mail" />

                </div>
            </div>

            <div class="row">
                <div class="mb-3">
                    <label for="login" class="form-label">NCM</label>
                    <input type="text" id="ncm" name="ncm" class="form-control" maxlength="9" placeholder="" onblur="addZeroInput(event)" />

                </div>
            </div>

            <div class="row">
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" id="password" name="password" class="form-control" />

                </div>
            </div>

            <div class="row">
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary btn-sm">
                        Salvar
                    </button>
                </div>
            </div>
        </form>

    </div>
</div>

<script>
    function adicionarZeros(valor) {
      // Remove tudo que não for número
      valor = valor.replace(/\D/g, "");

      // Adiciona zeros à esquerda até ter 7 dígitos
      while (valor.length < 7) {
        valor = "0" + valor;
      }

      return valor;
    }

    function aplicarMascara(valor) {
      // Adiciona a máscara no formato 00.000.00
      valor = valor.replace(/(\d{2})(\d)/, "$1.$2");
      valor = valor.replace(/(\d{3})(\d)/, "$1.$2");

      return valor;
    }

    function mascaraInput(event) {
        const input = event.target;
        // Adiciona zeros à esquerda e depois aplica a máscara
        // let valorComZeros = adicionarZeros(input.value);
        // input.value = aplicarMascara(valorComZeros);
        input.value = aplicarMascara(input.value);
    }

    function addZeroInput(event) {
        const input = event.target;
        // Adiciona zeros à esquerda e depois aplica a máscara
        let valorComZeros = adicionarZeros(input.value);
        input.value = aplicarMascara(valorComZeros);
    }
</script>
