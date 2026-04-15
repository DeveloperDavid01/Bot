<?php
$app = require __DIR__ . "/../bootstrap.php";

$question = $_POST['question'] ?? '';
$answer = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $question) {
    $answer = $app->getResponse($question);
}

//Necesiro crear un panel para la web en donde pueda cambiar entre diferentes modelos de IA, para esto necesito crear un nuevo archivo llamado "ModelSelector.php" en la carpeta "src" y luego incluirlo en el "bootstrap.php". Este archivo tendrá una clase llamada "ModelSelector" que se encargará de manejar la selección del modelo de IA.
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bot 0.1 - Tailwind Test</title>
    
    <link rel="stylesheet" href="output.css?v=<?php echo time(); ?>">
</head>
<body class="bg-slate-900 text-white p-10 font-sans">

    <div class="max-w-lg mx-auto bg-slate-800 p-6 rounded-xl shadow-lg border border-slate-700">
        <h1 class="text-2xl font-bold text-blue-400 mb-6 text-center">Asistente PHP Bot 0.1</h1>

        <form method="POST" class="flex flex-col gap-4">
            <div class="flex flex-col gap-2">
                <label for="question" class="text-sm text-slate-400">Tu pregunta:</label>
                <input 
                    
                    class="bg-slate-700 border border-slate-600 rounded-lg px-4 py-2 text-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all" 
                    type="text" 
                    name="question" 
                    value="<?=htmlspecialchars($question)?>" 
                    required
                    placeholder = "Escribe algo..."
                    title = "Solo preguntas relacionadas con PHP, cualquier otro tipo de preguntas pueden generar respuestas inchoerentes"

                >
            </div>
            
            <button 
                type="submit" 
                class="bg-blue-600 hover:bg-blue-500 text-white font-bold py-2 px-4 rounded-lg shadow-md transition-colors"
            >
                Enviar consulta
            </button>
        </form>

        <?php if ($answer): ?>
            <div class="mt-8 p-4 bg-slate-900 rounded-lg border-l-4 border-blue-500">
                <strong class="text-blue-400 block mb-1">Respuesta:</strong>
                <p class="text-slate-200"><?= htmlspecialchars($answer)?></p>
            </div>
        <?php endif; ?>

       
        <div class="mt-8 p-4 bg-slate-900 rounded-lg border-l-4 border-blue-500">
            <strong class="text-blue-400 block mb-1">Selecciona el modelo de IA:</strong>
            <form method="POST" class="flex flex-col gap-4">
                <select name="model" class="bg-slate-700 border border-slate-600 rounded-lg px-4 py-2 text-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all">
                    <option value="Ollama">Ollama</option>
                    <option value="OpenAI">OpenAI</option>
                    <option value="FakeAI">FakeAI</option>
                </select>
                <button type="submit" class="bg-blue-600 hover:bg-blue-500 text-white font-bold py-2 px-4 rounded-lg shadow-md transition-colors">
                    Cambiar modelo
                </button>
            </form>
         
    </div>

    

</body>
</html>