<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
    public function rumah()
    {
      echo"selamat datang di toko kami";
    }
    public function produk()
    {
        echo "<table border='1' width='20%' cellspacing='0' cellpadding='0' id='table2'>";
        echo "<tr><td align='center'>No</td><td align='center'>nama barang</td></tr>";
        echo "<tr><td align='center'>1</td><td>sepatu</td></tr>";
        echo "<tr><td align='center'>2</td><td>baju</td></tr>";
        echo "<tr><td align='center'>3</td><td>celana</td></tr>";
        echo "</table>";
    }
    public function tentang()
    {
      echo"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.";
    }
}

