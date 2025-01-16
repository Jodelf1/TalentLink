<?php $this->layout('layouts/base', ['title' => 'Minhas Candidaturas']) ?>

<h1>Minhas Candidaturas</h1>

<table>
    <thead>
        <tr>
            <th>Título da Vaga</th>
            <th>Status</th>
            <th>Data da Candidatura</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($candidaturas as $candidatura): ?>
            <tr>
                <td><?= htmlspecialchars($candidatura['titulo']) ?></td>
                <td><?= htmlspecialchars($candidatura['status']) ?></td>
                <td><?= htmlspecialchars($candidatura['data_candidatura']) ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
