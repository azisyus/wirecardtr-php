<?php include('menu.php');?>

<h2>Alt Üye İşyeri Yaratma</h2>
<fieldset>
    <legend><label style="font-weight:bold;width:250px;">MarketPlace Bilgileri</label></legend>
    <label style="font-weight:bold;">Servis Adı &nbsp; :   &nbsp; </label> WDTicket<br>
    <label style="font-weight:bold;">Operasyon Adı &nbsp; :&nbsp; </label> CreateSPRegistrationURL <br>
    <label style="font-weight:bold;">UserCode  &nbsp;:  &nbsp;</label> Wirecard tarafından verilen değer <br>
    <label style="font-weight:bold;">Pin &nbsp;:  &nbsp;</label> Wirecard tarafından verilen değer <br>
    <label style="font-weight:bold;">UniqueId &nbsp;:&nbsp;  </label> benzersiz id değeri <br>
    <label style="font-weight:bold;">İş Telefonu &nbsp;: &nbsp; </label>2121111111 <br>
    <label style="font-weight:bold;">Vergi Dairesi &nbsp;: &nbsp; </label>İstanbul <br>
    <label style="font-weight:bold;">Vergi Numarası &nbsp;: &nbsp; </label>11111111111 <br>
    <label style="font-weight:bold;">Banka Adı &nbsp;: &nbsp; </label>Ziraat Bankası <br>
    <label style="font-weight:bold;">IBAN &nbsp;: &nbsp; </label>TR330006100519786457841326 <br>
    <label style="font-weight:bold;">Banka Hesap Adı &nbsp;: &nbsp; </label>Ahmet Yılmaz <br>
    <label style="font-weight:bold;">Mağaza Ülkesi: &nbsp; : &nbsp;</label>TR<br>
    <label style="font-weight:bold;">Mağaza Şehri: &nbsp;</label>&nbsp; 34<br>
    <label style="font-weight:bold;">Mağaza Açık Adresi &nbsp;: &nbsp;</label>Gayrettepe Mh. Yıldız Posta Cd. D Plaza No:52 K:6 34349 Beşiktaş / İstanbul<br>
	<label style="font-weight:bold;">İmza Yetkilisi Adı &nbsp;: &nbsp; </label>Ahmet<br>
    <label style="font-weight:bold;">İmza Yetkilisi Soyadı &nbsp;: &nbsp;</label>Yılmaz<br>
    <label style="font-weight:bold;">İmza Yetkilisi Doğum Tarihi &nbsp;: &nbsp;</label>1970/10/29<br>
</fieldset>

<br />
<form action="" method="post" class="form-horizontal">
    <fieldset>
        <!-- Form Name -->
        <legend><label style="font-weight:bold;width:250px;">Market Place Detayları</label></legend>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="">Mağaza Tipi:</label>
            <div class="col-md-4">
                <select name="subPartnerType">
                    <option value="1">Individual - Şahıs firması</option>
                    <option value="2">PrivateCompany - Özel şirket</option>
                    <option value="3">Corporation - Kurumsal</option>
                </select>
            </div>
        </div>
 

    </fieldset>


    <!-- Button -->
    <div class="form-group">
        <label class="col-md-4 control-label" for=""></label>
        <div class="col-md-4">
            <button type="submit" id="" name="" class="btn btn-success">Mağaza Yarat</button>
        </div>
    </div>
</form>

<?php if (!empty($_POST)): ?>
<?php
     /**
     * Setting ayarlarını settings sınıfı içerisinden alıyoruz.
     * Token bilgilerini ve Üye işyeri gğncelleme için  gerekli olan MarketPlaceCreateSubPartnerRequest sınıfını formdan gelen bilgilerle doldurup, xml servis çağrısını başlatıyoruz.
     * Xml Servis çağrısı sonucunda oluşan servis çıktısını ekrana xml formatında yazdırıyoruz.
     */
    $settings=new Settings();
    $request = new MarketPlaceCreateSubPartnerRequest();
	$request->ServiceType = "WDTicket";
    $request->OperationType = "CreateSPRegistrationURL";
    $request->UniqueId = 5000;
    $request->SubPartnerType = $_POST["subPartnerType"]; 
   

    $request->Token= new Token();
    $request->Token->UserCode=$settings->UserCode;
    $request->Token->Pin=$settings->Pin;
    $request->BaseUrl = $settings->BaseUrl;
    
    
	
	
    $response = MarketPlaceCreateSubPartnerRequest::execute($request); // Market Place Create servisi başlatılması için gerekli servis çağırısını temsil eder.
    print "<h3>Sonuç:</h3>";
	echo "<pre>";
    echo htmlspecialchars ($response);  
    echo "</pre>";
	?>

<?php endif; ?>	 

<?php include('footer.php');?>
