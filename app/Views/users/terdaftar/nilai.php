<div class="table-responsive text-nowrap">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Mata Pelajaran</th>
                <th>Semester 1</th>
                <th>Semester 2</th>
                <th>Semester 3</th>
                <th>Semester 4</th>
                <th>Semester 5</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Bahasa Indonesia</td>
                <?php foreach ($nilai as $item) : ?>
                    <td><?= $item['bindo_1'] ?></td>
                    <td><?= $item['bindo_2'] ?></td>
                    <td><?= $item['bindo_3'] ?></td>
                    <td><?= $item['bindo_4'] ?></td>
                    <td><?= $item['bindo_5'] ?></td>
                <?php endforeach; ?>
            </tr>
            <tr>
                <td>Bahasa Inggris</td>
                <?php foreach ($nilai as $item) : ?>
                    <td><?= $item['bing_1'] ?></td>
                    <td><?= $item['bing_2'] ?></td>
                    <td><?= $item['bing_3'] ?></td>
                    <td><?= $item['bing_4'] ?></td>
                    <td><?= $item['bing_5'] ?></td>
                <?php endforeach; ?>
            </tr>
            <tr>
                <td>Matematika</td>
                <?php foreach ($nilai as $item) : ?>
                    <td><?= $item['mtk_1'] ?></td>
                    <td><?= $item['mtk_2'] ?></td>
                    <td><?= $item['mtk_3'] ?></td>
                    <td><?= $item['mtk_4'] ?></td>
                    <td><?= $item['mtk_5'] ?></td>
                <?php endforeach; ?>
            </tr>
            <tr>
                <td>IPA</td>
                <?php foreach ($nilai as $item) : ?>
                    <td><?= $item['ipa_1'] ?></td>
                    <td><?= $item['ipa_2'] ?></td>
                    <td><?= $item['ipa_3'] ?></td>
                    <td><?= $item['ipa_4'] ?></td>
                    <td><?= $item['ipa_5'] ?></td>
                <?php endforeach; ?>
            </tr>
            <tr>
                <td>IPS</td>
                <?php foreach ($nilai as $item) : ?>
                    <td><?= $item['ips_1'] ?></td>
                    <td><?= $item['ips_2'] ?></td>
                    <td><?= $item['ips_3'] ?></td>
                    <td><?= $item['ips_4'] ?></td>
                    <td><?= $item['ips_5'] ?></td>
                <?php endforeach; ?>
            </tr>
        </tbody>
    </table>
</div>