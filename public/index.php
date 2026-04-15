<?php

$app =require __DIR__ . "/../bootstrap.php";

$question = $_POST['question'] ?? '';
$answer = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $question) {
    $answer = $app->getResponse($question);
}

?>

<form method="POST">
    <label for="question">Tu pregunta:</label>
    <input type="text" name="question" value="<?=htmlspecialchars($question)?>" required>
    <button type="submit">Enviar</button>
</form>

<p>
    <strong>Respuesta:</strong>
    <?= htmlspecialchars($answer)?>
</p>