<?php 
@ob_start();
session_start();
if (empty($_SESSION['admin'])) {
    echo '<script>window.location="login.php";</script>';
    exit;
}

require 'config.php';
include $view;
$lihat = new view($config);

$toko = $lihat->toko();
$hsl  = $lihat->penjualan();

// Ambil parameter dengan aman
$kasir = '-';
if (!empty($hsl)) {
    // ambil nm_member dari salah satu record (semua sama karena kasirnya sama)
    $kasir = htmlspecialchars($hsl[0]['nm_member'] ?? '-', ENT_QUOTES, 'UTF-8');
}
$bayar     = isset($_GET['bayar'])     ? (int)preg_replace('/\D/','', $_GET['bayar']) : 0;
$kembali   = isset($_GET['kembali'])   ? (int)preg_replace('/\D/','', $_GET['kembali']) : 0;

function idr($angka) {
    return 'Rp ' . number_format((float)$angka, 0, ',', '.');
}

?>
<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <title>Nota • <?php echo htmlspecialchars($toko['nama_toko'] ?? 'Toko', ENT_QUOTES, 'UTF-8');?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Boleh dipakai atau diabaikan (kita override style sendiri agar konsisten saat print) -->
  <link rel="stylesheet" href="assets/css/bootstrap.css">
  <style>
    /* ====== Layout Struk 80mm ====== */
    :root {
      --ink:#111827;
      --muted:#6b7280;
      --line:#e5e7eb;
    }
    html, body { background:#fff; color:var(--ink); }
    body { margin:0; font-family: ui-sans-serif, -apple-system, Segoe UI, Roboto, Arial; }

    .receipt {
      width: 80mm;                /* lebar kertas thermal 80mm */
      max-width: 100%;
      margin: 0 auto;
      padding: 12px 12px 16px;
      font-size: 12px;
      line-height: 1.35;
    }
    .header { text-align:center; margin-bottom:10px; }
    .toko-nama { font-weight: 700; font-size: 14px; }
    .toko-alamat { color:var(--muted); }
    .meta {
      margin: 8px 0 10px;
      border-top:1px dashed var(--line);
      border-bottom:1px dashed var(--line);
      padding:8px 0;
      display:grid;
      grid-template-columns: 1fr 1fr;
      gap:6px 8px;
    }
    .meta div { display:flex; justify-content:space-between; }
    .muted { color:var(--muted); }

    table.items {
      width:100%;
      border-collapse:collapse;
      margin-top:6px;
    }
    table.items thead th {
      text-align:left;
      font-weight:700;
      border-bottom:1px dashed var(--line);
      padding:6px 0;
    }
    table.items td {
      padding:6px 0;
      vertical-align:top;
      border-bottom:1px dashed var(--line);
    }
    .text-right { text-align:right; }
    .small { font-size:11px; color:var(--muted); }

    .totals {
      margin-top:10px;
      border-top:1px dashed var(--line);
      border-bottom:1px dashed var(--line);
      padding:8px 0;
    }
    .rowline { display:flex; justify-content:space-between; padding:4px 0; }
    .rowline.total { font-weight:700; }

    .footer {
      text-align:center;
      margin-top:10px;
      font-size:11px;
      color:var(--muted);
    }

    @media print {
      @page { size: 80mm auto; margin: 0; }
      body { margin:0; }
      .receipt { padding:8px 10px 12px; }
      .no-print { display:none !important; }
    }
  </style>
</head>
<body onload="window.print()">

  <div class="receipt">
    <!-- Header Toko -->
    <div class="header">
      <div class="toko-nama"><?php echo htmlspecialchars($toko['nama_toko'] ?? 'TB Ilham Abadi', ENT_QUOTES, 'UTF-8'); ?></div>
      <div class="toko-alamat">
        <?php echo htmlspecialchars($toko['alamat_toko'] ?? '-', ENT_QUOTES, 'UTF-8'); ?>
      </div>
    </div>

    <!-- Info Nota -->
    <div class="meta">
      <div><span class="muted">Tanggal</span><span><?php echo date("j F Y, H:i"); ?></span></div>
      
      <div><span class="muted">Kasir</span><span><?php echo $kasir; ?></span></div>

    </div>

    <!-- Tabel Items -->
    <table class="items">
      <thead>
        <tr>
          <th style="width:6%">No</th>
          <th>Barang</th>
          <th class="text-right" style="width:36%">Qty × Harga</th>
          <th class="text-right" style="width:28%">Subtotal</th>
        </tr>
      </thead>
      <tbody>
        <?php $no=1; foreach($hsl as $isi): 
          $nama   = $isi['nama_barang'];
          $qty    = (int)$isi['jumlah'];
          $totalI = (float)$isi['total'];
          $harga  = $qty > 0 ? $totalI / $qty : 0;
        ?>
        <tr>
          <td><?php echo $no; ?></td>
          <td>
            <?php echo htmlspecialchars($nama, ENT_QUOTES, 'UTF-8'); ?><br>
            <span class="small muted">Kode: <?php echo htmlspecialchars($isi['id_barang'] ?? '-', ENT_QUOTES, 'UTF-8'); ?></span>
          </td>
          <td class="text-right"><?php echo $qty.' × '.idr($harga); ?></td>
          <td class="text-right"><?php echo idr($totalI); ?></td>
        </tr>
        <?php $no++; endforeach; ?>
      </tbody>
    </table>

    <!-- Total & Pembayaran -->
    <div class="totals">
      <?php $hasil = $lihat->jumlah(); $grand = (float)($hasil['bayar'] ?? 0); ?>
      <div class="rowline total">
        <span>Total</span><span><?php echo idr($grand); ?></span>
      </div>
      <div class="rowline">
        <span>Bayar</span><span><?php echo idr($bayar); ?></span>
      </div>
      <div class="rowline">
        <span>Kembali</span><span><?php echo idr($kembali); ?></span>
      </div>
    </div>

    <!-- Footer -->
    <div class="footer">
      Terima kasih telah berbelanja!<br>
      Simpan nota ini sebagai bukti transaksi.
    </div>

    <!-- Tombol non-print (jika dibuka manual) -->
    <div class="no-print" style="text-align:center;margin-top:10px;">
      <button onclick="window.print()" class="btn btn-sm btn-primary">Cetak Ulang</button>
    </div>
  </div>

</body>
</html>
