


<div class="main-header">
				<div class="container" >
					<div class="logo-wrap" itemprop="logo">
			
						<img src="https://png.pngtree.com/png-clipart/20230124/original/pngtree-elegant-m-letter-logo-png-image_8928765.png" style="height: 15vh; width: 15vh; " alt="Logo Image">
						<!-- <h1>Education</h1> -->
					</div>
					<div class="nav-wrap">
						<nav class="nav-desktop">
							<ul class="menu-list">
								<li><a href="index.php">Anasayfa</a></li>
								<li><a href="videolarım.php">Kurslarım</a></li>
								 <li class="menu-parent">Kategoriler
									<ul class="sub-menu">
										<li><a href="yazilim.php">YAZILIM</a></li>
										<li><a href="elektronik.php">ELEKTRONİK</a></li>
										<li><a href="eticaret.php">E-TİCARET</a></li>
										<li><a href="dileğitimi.php">DİL EGİTİMLERİ</a></li>
										<li><a href="iletisimbbecerileri.php">İLETİŞİM BECERİLERİ</a></li>	
									</ul>
								</li> 
								
								<li>   <?php 
            
                if(isset($_SESSION['oturum']) and $_SESSION['oturum']=="acik" ){ 
                
                  echo '<a class="" href="lib/cikis.php"><button>Çıkıs Yap</button></a>';
                  echo '<a class="" href="videoyukleme.php"><button>Eğitim Ver</button></a>';
                }else{
                  echo '<a class="" href="login.php"><button>Oturum Aç</button></a>' ;
				}
                
                
                ?></li>

								
							</ul>
							
						</nav>
						<div id="bar">
							<i class="fas fa-bars"></i>
						</div>
						<div id="close">
							<i class="fas fa-times"></i>
						</div>
					</div>
				</div>
			</div>