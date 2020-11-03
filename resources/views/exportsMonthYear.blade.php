
<p></p>
<p></p>
<table>
    <tr>
        <td colspan="7" style="font-size: 13px; font-weight: bold; text-align: center;">SAMPAH UNTUK SEKOLAH<td>
    </tr>
    <tr>
        <td colspan="7" style="font-size: 13px; font-weight: bold; text-align: center;">GEREJA MARIA ASSUMPTA KLATEN<td>
    </tr>
    @if( $category == 'all' )
    <tr>
        <td colspan="7" style="font-size: 13px; font-weight: bold; text-align: center;">JURNAL UMUM<td>
    </tr>
    @else
    <tr>
        <td colspan="7" style="font-size: 13px; font-weight: bold; text-align: center;">JURNAL UMUM KATEGORI {{ strtoupper($category) }}<td>
    </tr>
    @endif
    <tr>
        <td colspan="7" style="font-size: 13px; font-weight: bold; text-align: center;">PERIODE {{ $month_name }} {{ $year }}<td>
    <tr>
        <td></td>
    </tr>
</table>


<table>
    <thead>
    <tr>
        <th style="border: 10px solid black; font-size: 13px; font-weight: bold; text-align: center;">No</th>
        <th style="border: 10px solid black; font-size: 13px; font-weight: bold; text-align: center;">Donatur</th>
        <th style="border: 10px solid black; font-size: 13px; font-weight: bold; text-align: center;">Sampah</th>
        <th style="border: 10px solid black; font-size: 13px; font-weight: bold; text-align: center;">Kategori</th>
        <th style="border: 10px solid black; font-size: 13px; font-weight: bold; text-align: center;">Tanggal</th>
        <th style="border: 10px solid black; font-size: 13px; font-weight: bold; text-align: center;">Harga/Kg</th>
        <th style="border: 10px solid black; font-size: 13px; font-weight: bold; text-align: center;">Berat</th>
        <th style="border: 10px solid black; font-size: 13px; font-weight: bold; text-align: center;">Harga</th>
    </tr>
    </thead>
    <tbody>
    @foreach($datas as $item)
        <tr>
            <td style="border: 10px solid black; text-align: center;">{{ $i++ }}</td>
            <td style="border: 10px solid black;">{{ $item->donatur }}</td>
            <td style="border: 10px solid black;">{{ $item->trash->trash_name }}</td>
            <td style="border: 10px solid black;">{{ $item->trash->category->category_name }}</td>
            <td style="border: 10px solid black;">{{ $item->transaction->date }}</td>
            <td style="border: 10px solid black; text-align: left;">Rp {{ intval($item->price/$item->weight) }},- </td>
            <td style="border: 10px solid black; text-align: left;">{{ $item->weight }} Kg</td>
            <td style="border: 10px solid black; text-align: left;">Rp {{ $item->price }},-</td>
        </tr>
    @endforeach
        <tr>
            <td colspan="6" style="font-weight: bold; text-align: center; background-color: #f2f2f2;">Total</td>
            <td style="border: 10px solid black; font-weight: bold; background-color: #f2f2f2;">{{ $weightTotal }} Kg</td>
            <td style="border: 10px solid black; font-weight: bold; background-color: #f2f2f2;">Rp {{ $priceTotal }},-</td>
        </tr>
    </tbody>
</table>
