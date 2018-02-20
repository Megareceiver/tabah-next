//on-load action
$(function(){

    //materialize
    $('.button-collapse').sideNav();
    $('.navigation-collapse').sideNav();
    $('.dropdown-button').dropdown({constrainWidth: false});
    $('.modal').modal({dismissible: false});
    $('select').material_select();

    //tab
    check_active_tab();
    $(".kelembagaan-tab").unbind().on("click", function(){
      target = $(this).attr("href");
      target = target.replace("#","");
      $("#hibah-add").attr("href", "#form-" + target);

      //set into cookie
      set_cookie("tab_active", target, 1);
    });

    //currency activator
    currencyFormatActivator("[name=nominal], .currency");
    $("[name=nominal]").val(0);
    $('[name=nominal]').keyup();

    $("form button[type=reset]").unbind().on("click", function(){
      setTimeout(function() {
        $("[name=nominal]").val(0);
        $('[name=nominal]').keyup();
      }, 100);
    });

    //number only
    numberOnlyActivator(".number");


    //global action
    $(".modal-trigger").on("click", function(){
      if($(this).attr("data-id") != ""){
        edit_form_generator($(this).attr("data-id"), $(this).attr("data-section"), $(this).attr("data-target"));
      }
    });

    $(".btn-rab-edit").on("click", function(){
      if($(this).attr("data-id") != ""){
        edit_form_rab_generator($(this).attr("data-id"), $(this).attr("data-reference"), $(this).attr("data-target"));
      }
    });
});

function check_active_tab(){
  target = get_cookie("tab_active");
  $('ul.tabs').tabs('select_tab', target);
  $("#hibah-add").attr("href", "#form-" + target);
}

function edit_form_generator(nomor_dokumen, section, target){
  $.ajax({
		url: '/kelembagaan/get_info_proposal/' + target,
		type: 'post',
		dataType: 'json',
		async: false,
		data: { nomor_dokumen : nomor_dokumen },
		success: function(result){
       $(section + " [name=nomor_dokumen]").val(result.nomor_dokumen);
       $(section + " [name=judul]").val(result.judul);
       $(section + " [name=nominal]").val(result.nominal);
       $(section + " [name=latar_belakang]").val(result.latar_belakang);

       $(section + " label").removeClass("active").addClass("active");
       $('[name=nominal]').keyup();
		},
		complete: function(xhr,status) { },
		error: function(xhr,status,error) { console.log(status); }
	});
}

function edit_form_rab_generator(kode_data, nomor_dokumen, target){
  $.ajax({
		url: '/kelembagaan/get_info_rab_item/' + target,
		type: 'post',
		dataType: 'json',
		async: false,
		data: { kode_data : kode_data },
		success: function(result){
       $(target + " [name=kode_data]").val(result.kode_data);
       $(target + " [name=uraian]").val(result.uraian);
       $(target + " [name=volume]").val(result.volume);
       $(target + " [name=satuan]").val(result.satuan);
       $(target + " [name=harga]").val(result.harga);

       $(target + " label").removeClass("active").addClass("active");
       $('[name=harga]').keyup();
       // $('.btn-rab-delete').attr("href", "/kelembagaan/delete_rab/");
		},
		complete: function(xhr,status) { },
		error: function(xhr,status,error) { console.log(status); }
	});
}
