<table>
    <thead>
        <th>Kode Angkot</th>
        <th>Total Angkot</th>
        <th>Angkot Tersedia</th>
        <th>Angkot Terpakai</th>
        <th>Detail</th>
    </thead>
    <tbody>
        <?php
        foreach ($data_angkot as $data) :
            echo "<tr>
                <td>".$data['kode_angkot']."</td>
                <td>".$data['total_angkot']."</td>
                <td>".$data['angkot_tersedia']."</td>
                <td>".$data['angkot_terpakai']."</td>
                <td> <a href='".site_url('detail_data_angkot/'.$data['kode_angkot'])."'>Detail</a> </td>
            </tr>";
        endforeach;
        ?>
    </tbody>
</table>