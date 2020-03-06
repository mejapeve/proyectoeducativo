@extends('roles.student.index')

@section('section-student')
    <div class="mb-3 card">
        <div class="card-body">
           <div class="bg-holder bg-card bg-holder-blue">
           </div>
           <div class="justify-content-between align-items-center row">
              <div class="col-md">
                 <h5 class="mb-2 mb-md-0">Crear Avatar</h5>
              </div>
              <div class="col-auto">
                 <button class="mr-2 btn btn-falcon-default btn-sm">Guardar</button>
              </div>
           </div>
        </div>
     </div>
     <div class="mb-3 overflow-hidden card" style="min-width: 12rem;">
        <div class="bg-holder bg-card bg-holder-blue">
        </div>
        <div class="position-relative card-body">
           <h6> Puedes crear tu propio avatar o elegir uno</h6>
           <div class="row mt-3">
              <div class="col-4">
                 <img class="shadow-sm avatar-default rounded-circle" src="{{ asset('images/avatars/default/avatar-default-1.png') }}">
                 <img class="shadow-sm avatar-default rounded-circle" src="{{ asset('images/avatars/default/avatar-default-2.png') }}">
                 <img class="shadow-sm avatar-default rounded-circle" src="{{ asset('images/avatars/default/avatar-default-3.png') }}">
              </div>
              <div class="col-4">
                 <img id="avatar-selected" class="d-none shadow-sm rounded-circle" src="{{ asset('images/avatars/default/avatar-default-3.png') }}">
                 <canvas class="rounded-circle" width="193" height="133" id="canvas">No Canvas support</canvas>
              </div>
              <div class="col-4">
                 <div id="menu" class="">
                    <div class="mb-3">
                       <button class="tab-avatar mr-2 btn btn-falcon-primary" data-tab="piel">Piel</button>
                       <button class="tab-avatar mr-2 btn btn-falcon-success" data-tab="ojos">Ojos</button>
                       <button class="tab-avatar mr-2 btn btn-falcon-info" data-tab="boca">Boca</button>
                       <button class="tab-avatar mt-2 mr-2 btn btn-falcon-danger" data-tab="pelo">Cabello</button>
                       <button class="tab-avatar mr-2 mt-2 btn btn-falcon-warning" data-tab="gafas">Gafas</button>
                    </div>
                 </div>
                 <div id="avatar">
                    <div id="piel">
                       <img class="img-thumbnail activo" src="{{ asset('images/avatars/1_piel/1.png')}}" style="cursor: pointer;">
                    </div>
                    <div id="ojos" class="d-none">
                       <img class="img-thumbnail activo" src="{{ asset('images/avatars/2_ojos/1.png')}}" style="cursor: pointer;">
                       <img class="img-thumbnail" src="{{ asset('images/avatars/2_ojos/2.png')}}" style="cursor: pointer;">
                       <img class="img-thumbnail" src="{{ asset('images/avatars/2_ojos/3.png')}}" style="cursor: pointer;">
                       <img class="img-thumbnail" src="{{ asset('images/avatars/2_ojos/4.png')}}" style="cursor: pointer;">
                    </div>
                    <div id="boca" class="d-none">
                       <img class="img-thumbnail activo" src="{{ asset('images/avatars/3_boca/1.png')}}" style="cursor: pointer;">
                       <img class="img-thumbnail" src="{{ asset('images/avatars/3_boca/2.png')}}" style="cursor: pointer;">
                       <img class="img-thumbnail" src="{{ asset('images/avatars/3_boca/3.png')}}" style="cursor: pointer;">
                       <img class="img-thumbnail" src="{{ asset('images/avatars/3_boca/4.png')}}" style="cursor: pointer;">
                    </div>
                    <div id="pelo" class="d-none">
                       <img class="img-thumbnail activo" src="{{ asset('images/avatars/4_pelo/1.png')}}" style="cursor: pointer;">
                       <img class="img-thumbnail" src="{{ asset('images/avatars/4_pelo/2.png')}}" style="cursor: pointer;">
                       <img class="img-thumbnail" src="{{ asset('images/avatars/4_pelo/3.png')}}" style="cursor: pointer;">
                       <img class="img-thumbnail" src="{{ asset('images/avatars/4_pelo/4.png')}}" style="cursor: pointer;">
                    </div>
                    <div id="gafas" class="d-none">
                       <img class="img-thumbnail activo" src="{{ asset('images/avatars/5_gafas/1.png')}}" style="cursor: pointer;">
                       <img class="img-thumbnail" src="{{ asset('images/avatars/5_gafas/2.png')}}" style="cursor: pointer;">
                       <img class="img-thumbnail" src="{{ asset('images/avatars/5_gafas/3.png')}}" style="cursor: pointer;">
                       <img class="img-thumbnail" src="{{ asset('images/avatars/5_gafas/4.png')}}" style="cursor: pointer;">
                    </div>
                 </div>
                 <input type="hidden" id="colores" class="card" _data-colores="#a1a1a1,#FDF2E9,#EBF5FB,#F7DC6F,#F2CFAF"/>
              </div>
           </div>
        </div>
     </div>
<style>
    .avatar-default {
        max-width: 54px;
        margin: 4px;
        border-radius: 39%!important;
    }
    #avatar-selected {
        border-radius: 39%!important;
    }
    #avatar div img {
        width: 100px;
    }
    #colors li:first-child {
        margin-top: 10px;
    }
    #colors {
        padding-left: 20px!important;
    }
</style>
<script>
    $('#avatar').Cubexy();
    $(".avatar-default").click(function(){
        $("#avatar-selected").attr("src",$(this).attr('src'));
        $("#canvas").hide();
        $("#colors").hide();
        $("#avatar-selected").addClass("d-block");
    });
    $("#colors").parent().addClass("card");
    $("#colors").hide();
    $("#colors").addClass("mb-0");
    $("#avatar div img").click(function(){
        $("#canvas").show();
        $("#avatar-selected").hide();
        $("#avatar-selected").removeClass("d-block").addClass("dnone");
    });
    $(".tab-avatar").click(function(){
        $("#avatar").find("div").addClass("d-none");
        $("#canvas").show();
        $("#colors").hide();
        $("#avatar-selected").removeClass("d-block").addClass("dnone");
        $("#avatar").find("div").removeClass("d-block");
        $("#" + $(this).attr("data-tab")).addClass("d-block");
    });


    $("#avatar div img").click(function(){
        $("#colors").show();
    });
</script>
@endsection
