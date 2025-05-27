<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de IMC</title> <link rel="stylesheet" href="css/style.css">
</head>
<body> <div class="background"> 
<div class="border">
    
    <h2>Calculadora de IMC</h2>
    
    

    <form id="form-imc">
        Nome:<br>
        <input type="text" name="nome" id="nome" required><br><br>

        Sexo:<br>
        <select name="sexo" id="sexo" required>
            <option value="">Selecione</option>
            <option value="Masculino">Masculino</option>
            <option value="Feminino">Feminino</option>
            <option value="Outro">Outro</option>
        </select><br><br>

        Peso (kg):<br>
        <input type="number" name="peso" id="peso" step="0.1" required><br><br>

        Altura (m):<br>
        <input type="number" name="altura" id="altura" step="0.01" required><br><br>

        <input type="submit" value="Calcular IMC">
    </form> </div> </div>

    <h3 id="resultado"></h3>

    <script>
        document.getElementById("form-imc").addEventListener("submit", function(event) {
            event.preventDefault();

            const nome = document.getElementById("nome").value.trim();
            const sexo = document.getElementById("sexo").value;
            const peso = parseFloat(document.getElementById("peso").value);
            const altura = parseFloat(document.getElementById("altura").value);

            if (nome && sexo && peso > 0 && altura > 0) {
                const imc = peso / (altura * altura);
                let classificacao = "";

                // Classificação personalizada por sexo
                if (sexo === "Masculino") {
                    if (imc < 20) {
                        classificacao = "Abaixo do peso";
                    } else if (imc < 25) {
                        classificacao = "Peso normal";
                    } else if (imc < 30) {
                        classificacao = "Sobrepeso";
                    } else {
                        classificacao = "Obesidade";
                    }
                } else if (sexo === "Feminino") {
                    if (imc < 19) {
                        classificacao = "Abaixo do peso";
                    } else if (imc < 24) {
                        classificacao = "Peso normal";
                    } else if (imc < 29) {
                        classificacao = "Sobrepeso";
                    } else {
                        classificacao = "Obesidade";
                    }
                } else {
                    // Para "Outro" ou não especificado, usa faixa padrão
                    if (imc < 18.5) {
                        classificacao = "Abaixo do peso";
                    } else if (imc < 24.9) {
                        classificacao = "Peso normal";
                    } else if (imc < 29.9) {
                        classificacao = "Sobrepeso";
                    } else {
                        classificacao = "Obesidade";
                    }
                }
                document.getElementById("resultado").textContent = 
                    `${nome} (${sexo}), seu IMC é ${imc.toFixed(2)} - ${classificacao}`;
            } else {
                document.getElementById("resultado").textContent = 
                    "Por favor, preencha todos os campos corretamente.";
            }
        });
    </script>
</body>
</html>
