<?php require_once "header.php" ?> 

    <div class="container-fluid">
    	
    	<div class="row">
    		<div id="map-canvas" style="height: 400px"></div>
    	</div>
    	<div class="row jarak" style="padding: 10px 10px 0; position:relative; background:#ECF0F1;">
				<div class="col-md-10">
					<div class="tabbable" id="tabs-662392">
						<ul class="nav nav-tabs">
							<li class="">
								<a href="#panelInfoLok" data-toggle="tab" aria-expanded="false">Informasi Lokasi</a>
							</li>
							<li class="">
								<a href="#panelInfoJalur" data-toggle="tab" aria-expanded="false">Informasi Jalur</a>
							</li>
							<li class="active">
								<a href="#panelInfoUser" data-toggle="tab" aria-expanded="true">Informasi Pengguna</a>
							</li>
						</ul>
						<div class="tab-content">
							<div class="tab-pane" id="panelInfoLok">
								<p id="">
									<b>Info Lokasi Mobil, Posisi Anda Yang Paling Dibawah</b>
								</p>
								<select id="infoLokasi" class="form-control" size="5"><option>Jl. Cumi Cumi, Palu Bar., Kota Palu, Sulawesi Tengah 94111, Indonesia</option><option>Jl. Samratulangi, Palu Tim., Kota Palu, Sulawesi Tengah 94118, Indonesia</option><option>Jl. Diponegoro No.43A, Palu Bar., Kota Palu, Sulawesi Tengah 94221, Indonesia</option><option>Jl. Kyai Maja, Palu Tim., Kota Palu, Sulawesi Tengah 94111, Indonesia</option><option>Jl. Rajamoili, Palu Bar., Kota Palu, Sulawesi Tengah 94111, Indonesia</option><option>Jl. Hayam Wuruk, Palu Tim., Kota Palu, Sulawesi Tengah 94111, Indonesia</option><option>Kanginan I No.11-15, Genteng, Kota SBY, Jawa Timur 60272, Indonesia</option></select>
							</div>
							<div class="tab-pane" id="panelInfoJalur">
								<select id="jalurLokasi" class="form-control" size="5"><option>Asal :Jl. Cumi Cumi, Palu Bar., Kota Palu, Sulawesi Tengah 94111, Indonesia,Tujuan :Jl. Samratulangi, Palu Tim., Kota Palu, Sulawesi Tengah 94118, Indonesia,jarak :2780</option><option>Asal :Jl. Cumi Cumi, Palu Bar., Kota Palu, Sulawesi Tengah 94111, Indonesia,Tujuan :Jl. Diponegoro No.43A, Palu Bar., Kota Palu, Sulawesi Tengah 94221, Indonesia,jarak :1171</option><option>Asal :Jl. Cumi Cumi, Palu Bar., Kota Palu, Sulawesi Tengah 94111, Indonesia,Tujuan :Jl. Kyai Maja, Palu Tim., Kota Palu, Sulawesi Tengah 94111, Indonesia,jarak :3209</option><option>Asal :Jl. Cumi Cumi, Palu Bar., Kota Palu, Sulawesi Tengah 94111, Indonesia,Tujuan :Jl. Rajamoili, Palu Bar., Kota Palu, Sulawesi Tengah 94111, Indonesia,jarak :3669</option><option>Asal :Jl. Cumi Cumi, Palu Bar., Kota Palu, Sulawesi Tengah 94111, Indonesia,Tujuan :Jl. Hayam Wuruk, Palu Tim., Kota Palu, Sulawesi Tengah 94111, Indonesia,jarak :2817</option><option>Asal :Jl. Cumi Cumi, Palu Bar., Kota Palu, Sulawesi Tengah 94111, Indonesia,Tujuan :Kanginan I No.11-15, Genteng, Kota SBY, Jawa Timur 60272, Indonesia,jarak :1683205</option><option>Asal :Jl. Samratulangi, Palu Tim., Kota Palu, Sulawesi Tengah 94118, Indonesia,Tujuan :Jl. Cumi Cumi, Palu Bar., Kota Palu, Sulawesi Tengah 94111, Indonesia,jarak :2471</option><option>Asal :Jl. Samratulangi, Palu Tim., Kota Palu, Sulawesi Tengah 94118, Indonesia,Tujuan :Jl. Diponegoro No.43A, Palu Bar., Kota Palu, Sulawesi Tengah 94221, Indonesia,jarak :3645</option><option>Asal :Jl. Samratulangi, Palu Tim., Kota Palu, Sulawesi Tengah 94118, Indonesia,Tujuan :Jl. Kyai Maja, Palu Tim., Kota Palu, Sulawesi Tengah 94111, Indonesia,jarak :1007</option><option>Asal :Jl. Samratulangi, Palu Tim., Kota Palu, Sulawesi Tengah 94118, Indonesia,Tujuan :Jl. Rajamoili, Palu Bar., Kota Palu, Sulawesi Tengah 94111, Indonesia,jarak :1400</option><option>Asal :Jl. Samratulangi, Palu Tim., Kota Palu, Sulawesi Tengah 94118, Indonesia,Tujuan :Jl. Hayam Wuruk, Palu Tim., Kota Palu, Sulawesi Tengah 94111, Indonesia,jarak :902</option><option>Asal :Jl. Samratulangi, Palu Tim., Kota Palu, Sulawesi Tengah 94118, Indonesia,Tujuan :Kanginan I No.11-15, Genteng, Kota SBY, Jawa Timur 60272, Indonesia,jarak :1681184</option><option>Asal :Jl. Diponegoro No.43A, Palu Bar., Kota Palu, Sulawesi Tengah 94221, Indonesia,Tujuan :Jl. Cumi Cumi, Palu Bar., Kota Palu, Sulawesi Tengah 94111, Indonesia,jarak :1404</option><option>Asal :Jl. Diponegoro No.43A, Palu Bar., Kota Palu, Sulawesi Tengah 94221, Indonesia,Tujuan :Jl. Samratulangi, Palu Tim., Kota Palu, Sulawesi Tengah 94118, Indonesia,jarak :2852</option><option>Asal :Jl. Diponegoro No.43A, Palu Bar., Kota Palu, Sulawesi Tengah 94221, Indonesia,Tujuan :Jl. Kyai Maja, Palu Tim., Kota Palu, Sulawesi Tengah 94111, Indonesia,jarak :2460</option><option>Asal :Jl. Diponegoro No.43A, Palu Bar., Kota Palu, Sulawesi Tengah 94221, Indonesia,Tujuan :Jl. Rajamoili, Palu Bar., Kota Palu, Sulawesi Tengah 94111, Indonesia,jarak :2852</option><option>Asal :Jl. Diponegoro No.43A, Palu Bar., Kota Palu, Sulawesi Tengah 94221, Indonesia,Tujuan :Jl. Hayam Wuruk, Palu Tim., Kota Palu, Sulawesi Tengah 94111, Indonesia,jarak :2695</option><option>Asal :Jl. Diponegoro No.43A, Palu Bar., Kota Palu, Sulawesi Tengah 94221, Indonesia,Tujuan :Kanginan I No.11-15, Genteng, Kota SBY, Jawa Timur 60272, Indonesia,jarak :1684199</option><option>Asal :Jl. Kyai Maja, Palu Tim., Kota Palu, Sulawesi Tengah 94111, Indonesia,Tujuan :Jl. Cumi Cumi, Palu Bar., Kota Palu, Sulawesi Tengah 94111, Indonesia,jarak :2141</option><option>Asal :Jl. Kyai Maja, Palu Tim., Kota Palu, Sulawesi Tengah 94111, Indonesia,Tujuan :Jl. Samratulangi, Palu Tim., Kota Palu, Sulawesi Tengah 94118, Indonesia,jarak :1026</option><option>Asal :Jl. Kyai Maja, Palu Tim., Kota Palu, Sulawesi Tengah 94111, Indonesia,Tujuan :Jl. Diponegoro No.43A, Palu Bar., Kota Palu, Sulawesi Tengah 94221, Indonesia,jarak :2093</option><option>Asal :Jl. Kyai Maja, Palu Tim., Kota Palu, Sulawesi Tengah 94111, Indonesia,Tujuan :Jl. Rajamoili, Palu Bar., Kota Palu, Sulawesi Tengah 94111, Indonesia,jarak :392</option><option>Asal :Jl. Kyai Maja, Palu Tim., Kota Palu, Sulawesi Tengah 94111, Indonesia,Tujuan :Jl. Hayam Wuruk, Palu Tim., Kota Palu, Sulawesi Tengah 94111, Indonesia,jarak :392</option><option>Asal :Jl. Kyai Maja, Palu Tim., Kota Palu, Sulawesi Tengah 94111, Indonesia,Tujuan :Kanginan I No.11-15, Genteng, Kota SBY, Jawa Timur 60272, Indonesia,jarak :1682109</option><option>Asal :Jl. Rajamoili, Palu Bar., Kota Palu, Sulawesi Tengah 94111, Indonesia,Tujuan :Jl. Cumi Cumi, Palu Bar., Kota Palu, Sulawesi Tengah 94111, Indonesia,jarak :1965</option><option>Asal :Jl. Rajamoili, Palu Bar., Kota Palu, Sulawesi Tengah 94111, Indonesia,Tujuan :Jl. Samratulangi, Palu Tim., Kota Palu, Sulawesi Tengah 94118, Indonesia,jarak :1418</option><option>Asal :Jl. Rajamoili, Palu Bar., Kota Palu, Sulawesi Tengah 94111, Indonesia,Tujuan :Jl. Diponegoro No.43A, Palu Bar., Kota Palu, Sulawesi Tengah 94221, Indonesia,jarak :1917</option><option>Asal :Jl. Rajamoili, Palu Bar., Kota Palu, Sulawesi Tengah 94111, Indonesia,Tujuan :Jl. Kyai Maja, Palu Tim., Kota Palu, Sulawesi Tengah 94111, Indonesia,jarak :392</option><option>Asal :Jl. Rajamoili, Palu Bar., Kota Palu, Sulawesi Tengah 94111, Indonesia,Tujuan :Jl. Hayam Wuruk, Palu Tim., Kota Palu, Sulawesi Tengah 94111, Indonesia,jarak :691</option><option>Asal :Jl. Rajamoili, Palu Bar., Kota Palu, Sulawesi Tengah 94111, Indonesia,Tujuan :Kanginan I No.11-15, Genteng, Kota SBY, Jawa Timur 60272, Indonesia,jarak :1682447</option><option>Asal :Jl. Hayam Wuruk, Palu Tim., Kota Palu, Sulawesi Tengah 94111, Indonesia,Tujuan :Jl. Cumi Cumi, Palu Bar., Kota Palu, Sulawesi Tengah 94111, Indonesia,jarak :2490</option><option>Asal :Jl. Hayam Wuruk, Palu Tim., Kota Palu, Sulawesi Tengah 94111, Indonesia,Tujuan :Jl. Samratulangi, Palu Tim., Kota Palu, Sulawesi Tengah 94118, Indonesia,jarak :902</option><option>Asal :Jl. Hayam Wuruk, Palu Tim., Kota Palu, Sulawesi Tengah 94111, Indonesia,Tujuan :Jl. Diponegoro No.43A, Palu Bar., Kota Palu, Sulawesi Tengah 94221, Indonesia,jarak :2485</option><option>Asal :Jl. Hayam Wuruk, Palu Tim., Kota Palu, Sulawesi Tengah 94111, Indonesia,Tujuan :Jl. Kyai Maja, Palu Tim., Kota Palu, Sulawesi Tengah 94111, Indonesia,jarak :392</option><option>Asal :Jl. Hayam Wuruk, Palu Tim., Kota Palu, Sulawesi Tengah 94111, Indonesia,Tujuan :Jl. Rajamoili, Palu Bar., Kota Palu, Sulawesi Tengah 94111, Indonesia,jarak :691</option><option>Asal :Jl. Hayam Wuruk, Palu Tim., Kota Palu, Sulawesi Tengah 94111, Indonesia,Tujuan :Kanginan I No.11-15, Genteng, Kota SBY, Jawa Timur 60272, Indonesia,jarak :1681756</option><option>Asal :Kanginan I No.11-15, Genteng, Kota SBY, Jawa Timur 60272, Indonesia,Tujuan :Jl. Cumi Cumi, Palu Bar., Kota Palu, Sulawesi Tengah 94111, Indonesia,jarak :1701856</option><option>Asal :Kanginan I No.11-15, Genteng, Kota SBY, Jawa Timur 60272, Indonesia,Tujuan :Jl. Samratulangi, Palu Tim., Kota Palu, Sulawesi Tengah 94118, Indonesia,jarak :1700120</option><option>Asal :Kanginan I No.11-15, Genteng, Kota SBY, Jawa Timur 60272, Indonesia,Tujuan :Jl. Diponegoro No.43A, Palu Bar., Kota Palu, Sulawesi Tengah 94221, Indonesia,jarak :1703029</option><option>Asal :Kanginan I No.11-15, Genteng, Kota SBY, Jawa Timur 60272, Indonesia,Tujuan :Jl. Kyai Maja, Palu Tim., Kota Palu, Sulawesi Tengah 94111, Indonesia,jarak :1701072</option><option>Asal :Kanginan I No.11-15, Genteng, Kota SBY, Jawa Timur 60272, Indonesia,Tujuan :Jl. Rajamoili, Palu Bar., Kota Palu, Sulawesi Tengah 94111, Indonesia,jarak :1701532</option><option>Asal :Kanginan I No.11-15, Genteng, Kota SBY, Jawa Timur 60272, Indonesia,Tujuan :Jl. Hayam Wuruk, Palu Tim., Kota Palu, Sulawesi Tengah 94111, Indonesia,jarak :1700680</option></select>
							</div>
							<div class="tab-pane active" id="panelInfoUser"><br>
							<input type="text" class="form-control" id="userPengguna" value="iank" readonly="">
							<input type="text" class="form-control hide" id="idPengguna" value="2" readonly="">
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-2 jarakTombol">
					<button id="cariMobil" type="button" class="btn btn-block btn-success btn-default">
						<span class="glyphicon glyphicon-search"></span> Cari Mobil
					</button>
					<button type="button" class="btn btn-block btn-warning btn-default">
						<span class="glyphicon glyphicon-pencil"></span> Lapor Admin
					</button>
					<button type="button" class="btn btn-block btn-danger btn-default">
						<span class="glyphicon glyphicon-remove-sign"></span> Batalkan Pencarian
					</button>
				</div>
			</div>

    </div> <!-- /container -->

<?php require_once "footer.php" ?>	