//on-load action
$(function(){
    //materialize
    $(".button-collapse").sideNav();
});

// cookie management --------------

function get_hostname(clear=false){
  var hostname = location.hostname;
  if(clear === true) hostname = hostname.replace(".","");

  return hostname;
}

function set_cookie(cname,cvalue,exdays) {
    cname = get_hostname() + "_" + cname;
    
    var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires=" + d.toGMTString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function get_cookie(cname) {
    cname = get_hostname() + "_" + cname;

    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}
// cookie management end --------------

// Form Auto
// Currency Masking --------------
function currencyFormatActivator(target){
	$(target).on('keyup', function(e){
		if ((e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) || $(this).val() == "") { return false; }
		else{
	    	var n = parseInt($(this).val().replace(/\D/g,''),10);
	    	$(this).val(n.toLocaleString());

	    	if($(this).attr('terbilang-name') != ""){
	    		$('[name=' + $(this).attr('terbilang-name') + ']').html( "\"" + terbilang($(this).val().replace(/\D/g,'')).toUpperCase() + "\"");
	    	}
		}
	});

	$(target).keypress(function (e) {
	    if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
	        return false;
	    }
	});
}

var daftarAngka=new Array("","satu","dua","tiga","empat","lima","enam","tujuh","delapan","sembilan");
function terbilang(nilai){
	var temp='';
	var hasilBagi,sisaBagi;
	//batas untuk ribuan
	var batas=3;
	//untuk menentukan ukuran array, jumlahnya sesuaikan dengan jumlah anggota dari array gradeNilai[]
	var maxBagian = 5;
	var gradeNilai=new Array("","ribu","juta","milyar","triliun");
	//cek apakah ada angka 0 didepan ==> 00098, harus diubah menjadi 98
	nilai = this.hapusNolDiDepan(nilai);
	var nilaiTemp = ubahStringKeArray(batas, maxBagian, nilai);
	//ubah menjadi bentuk terbilang
	var j = nilai.length;
	//menentukan batas array
	var banyakBagian = (j % batas) == 0 ? (j / batas) : Math.round(j / batas + 0.5);
	var h=0;
	    for(var i = banyakBagian - 1; i >=0; i-- ){
	        var nilaiSementara = parseInt(nilaiTemp[h]);
	        if (nilaiSementara == 1 && i == 1){
	            temp +="seribu ";
	            }
	        else {
	            temp +=this.ubahRatusanKeHuruf(nilaiTemp[h])+" ";
	// cek apakah string bernilai 000, maka jangan tambahkan gradeNilai[i]
	            if(nilaiTemp[h] != "000"){
	                temp += gradeNilai[i]+" ";
	                }
	            }
	        h++;
	        }

  if(temp == "") temp = "NOL";
	return temp + " RUPIAH";
}

function ubahStringKeArray(batas, maxBagian,kata){
// maksimal 999 milyar
	var temp= new Array(maxBagian);
	var j = kata.length;
	//menentukan batas array
	var banyakBagian = (j % batas) == 0 ? (j / batas) : Math.round(j / batas + 0.5);
	    for(var i = banyakBagian - 1; i >= 0 ; i--){
	        var k = j - batas;
	        if(k < 0) k = 0;
	            temp[i]=kata.substring(k,j);
	        j = k ;
	        if (j == 0)
	        break;
	        }
	 return temp;
 }

function ubahRatusanKeHuruf(nilai){
	//maksimal 3 karakter
	var batas = 2;
	//membagi string menjadi 2 bagian, misal 123 ==> 1 dan 23
	var maxBagian = 2;
	var temp = this.ubahStringKeArray(batas, maxBagian, nilai);
	var j = nilai.length;
	var hasil="";
	//menentukan batas array
	var banyakBagian = (j % batas) == 0 ? (j / batas) : Math.round(j / batas + 0.5);
	    for(var i = 0; i < banyakBagian ;i++){
	//cek string yang memiliki panjang lebih dari satu ==> belasan atau puluhan
	        if(temp[i].length > 1){
	//cek untuk yang bernilai belasan ==> angka pertama 1 dan angka kedua 0 - 9, seperti 11,16 dst
	            if(temp[i].charAt(0) == '1'){
	                if(temp[i].charAt(1) == '1') {
	                    hasil += "sebelas";
	                    }
	                else if(temp[i].charAt(1) == '0') {
	                    hasil += "sepuluh";
	                    }
	            else hasil += daftarAngka[temp[i].charAt(1) - '0']+ " belas ";
	                }
	 //cek untuk string dengan format angka  pertama 0 ==> 09,05 dst
	            else if(temp[i].charAt(0) == '0'){
	            hasil += daftarAngka[temp[i].charAt(1) - '0'] ;
	            }
	 //cek string dengan format selain angka pertama 0 atau 1
	            else
	            hasil += daftarAngka[temp[i].charAt(0) - '0']+ " puluh " +daftarAngka[temp[i].charAt(1) - '0'] ;
	            }
	        else {
	//cek string yang memiliki panjang = 1 dan berada pada posisi ratusan
	            if(i == 0 && banyakBagian !=1){
	                if (temp[i].charAt(0) == '1')
	                    hasil+=" seratus ";
	                else if (temp[i].charAt(0) == '0')
	                    hasil+=" ";
	                else hasil+= daftarAngka[parseInt(temp[i])]+" ratus ";
	            }
	//string dengan panjang satu dan tidak berada pada posisi ratusan ==> satuan
	            else hasil+= daftarAngka[parseInt(temp[i])];
	            }
	    }
	return hasil;
}

function hapusNolDiDepan(nilai){
	while(nilai.indexOf("0") == 0){
	    nilai = nilai.substring(1, nilai.length);
	    }
	return nilai;
}
// Currency Masking End ----------

// Number Only -------------------
function numberOnlyActivator(target){
	$(target).keypress(function (e) {
	    if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
	        return false;
	    }
	});
}
// Number Only End ---------------
