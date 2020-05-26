MyApp.controller("PlanContoller", ["$scope", "$http", function($scope, $http) {

    $scope.plan={}
    $scope.planEdit={}
    $scope.plan.items=[]
    $scope.freePlan
    $scope.isExpire
    $scope.moments
    $scope.route
    $scope.routeDatable
    $scope.routeEdit
    $scope.types
    $scope.sequences
    var table = $('#myTable');
    $scope.table = table;
    $scope.init = (route,routeDatable,routeEdit) => {
        $scope.route = route
        $scope.routeDatable = routeDatable
        $scope.routeEdit = routeEdit
        table = $('#myTable').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            language: {
                "decimal": "",
                "emptyTable": "No hay información",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
                "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
                "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Entradas",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscar:",
                "zeroRecords": "Sin resultados encontrados",
                "paginate": {
                    "first": "Primeros",
                    "last": "Ultimo",
                    "next": "Siguiente",
                    "previous": "Anterior"
                }
            },
            'ajax': $scope.routeDatable,
            'columns': [
                {data: 'name', className: ''},
                {data: 'description', className: ''},
                {data: 'type_rating_plan', className: 'text-center'},
                {data: 'quantity_contents', className: 'text-center'},
                {data: 'quantity_days', className: 'text-center'},
                {data: 'price', className: 'text-center'},
                {data: 'init_date', className: 'text-center'},
                {data: 'expiration_date', className: 'text-center'},
                {data: 'edit', className: 'text-center'},
            ]
        });
        new $.fn.dataTable.FixedHeader( table );

        $scope.freePlan = false;
        $scope.isExpire = false;
        $http({
            url:'/get_types_plans/',
            method: "GET",
        }).
        then(function (response) {
            $scope.types = response.data.data
            $scope.plan.types = response.data.data
        }).catch(function (e) {

        });
        $http({
            url:'/get_all_sequences/',
            method: "GET",
        }).
        then(function (response) {
            $scope.plan.sequences = response.data.data
            $scope.sequences = response.data.data
        }).catch(function (e) {

        });
    };
    $scope.toggleSelection = (data) =>{
        (data.target.checked) ? $scope.plan.isFree = $scope.freePlan = true : $scope.plan.isFree = $scope.freePlan = false
    }
    $scope.sequenceChange = (data) =>{
        const result = ($scope.plan.sequences).filter(res=>res.id == data ).map(ele=>ele.moments);
        $scope.plan.moments =  result[0]
    }

    $scope.addItem = ()=> {
        $scope.plan.items.push({'description':$scope.plan.item})
        $scope.plan.item = ''
        console.log($scope.plan.items);
    }

    $scope.deleteItem = (index) => {
        ($scope.plan.items).splice(index, 1)
    }
    $scope.registerPlan = () =>{

        var formDatas = new FormData();
        formDatas.append('name',$scope.plan.name)
        formDatas.append('type_rating_plan_id',$scope.plan.typeSelected)
        formDatas.append('quantity',$scope.plan.quantity)
        formDatas.append('days',$scope.plan.days)
        formDatas.append('description',$scope.plan.description)
        formDatas.append('cost',$scope.plan.cost)
        formDatas.append('is_free',$scope.plan.isFree)
        formDatas.append('itmes',JSON.stringify($scope.plan.items))
        var new_startDate= new Date($scope.plan.init_date);
        var date = moment(new_startDate).format('YYYY-MM-DD');
        formDatas.append('init_date',date)
        formDatas.append('expiration_date',null)
        if($scope.plan.isExpire){
            new_startDate= new Date($scope.plan.expiration_date);
            date = moment(new_startDate).format('YYYY-MM-DD');
            formDatas.append('expiration_date',date)
        }
        formDatas.append('is_free',$scope.plan.isFree)
        if($scope.plan.isFree){
            formDatas.append('sequenceSelected',$scope.plan.sequenceSelected)
            formDatas.append('momentSelected',$scope.plan.momentSelected)
        }
        $http({
            url:$scope.route,
            headers: { 'Content-Type': undefined },
            method: "POST",
            data:formDatas

        }).then((response)=>{
            $('#exampleModal').modal('hide');
            $scope.plan={}
            $scope.plan.types = $scope.types
            $scope.plan.sequences = $scope.sequences
            $scope.plan.items = []
            $scope.freePlan = false
            $scope.isExpire = false
            table.ajax.reload()
            swal({
                text:'El plan ha sido creado' ,
                type: "success",
                showCancelButton: false,
                showConfirmButton: false
            }).catch(swal.noop);
            //$("#types").val('').trigger('change')
        }).catch(function (e) {
            console.log(e)
            swal({
                text:'algo salio mal, intente de nuevo' ,
                type: "warning",
                showCancelButton: false,
                showConfirmButton: false
            }).catch(swal.noop);
        });

    }
    table.on('click', '.editPlan', function (e) {

        $tr = $(this).closest('tr');
        let dataTable = table.row($tr).data();
        $scope.planEdit.id = dataTable.id
        $scope.planEdit.name = dataTable.name
        $scope.planEdit.description = dataTable.description
        $scope.planEdit.price = parseInt(dataTable.price)
        $scope.planEdit.days = parseInt(dataTable.days)
        $scope.planEdit.init_date = new Date(dataTable.init_date+' 00:00:00');
        $scope.plan.isExpire = false
        if(dataTable.expiration_date !== "No aplica"){
            $scope.plan.isExpire = $scope.isExpire = true
            $scope.planEdit.expiration_date = new Date(dataTable.expiration_date+' 00:00:00');
        }

        $scope.$apply();
        $('#modalEdit').modal('show')

    });
    $scope.toggleSelectionExpirtion = (data) =>{
        (data.target.checked) ? $scope.plan.isExpire = $scope.isExpire = true : $scope.plan.isExpire = $scope.isExpire = false
    }

    $scope.editPlan = () => {
        var formDatas = new FormData();
        formDatas.append('id',$scope.planEdit.id)
        formDatas.append('name',$scope.planEdit.name)
        formDatas.append('days',$scope.planEdit.days)
        formDatas.append('description',$scope.planEdit.description)
        formDatas.append('cost',$scope.planEdit.price)
        var new_startDate = new Date($scope.planEdit.init_date);
        var date = moment(new_startDate).format('YYYY-MM-DD');
        formDatas.append('init_date',date)
        if($scope.plan.isExpire){
            new_startDate = new Date($scope.planEdit.expiration_date);
            date = moment(new_startDate).format('YYYY-MM-DD');
            formDatas.append('expiration_date',date)
            formDatas.append('isExpiration',true)
        }else{
            formDatas.append('isExpiration',false)
        }
        $http({
            url:$scope.routeEdit,
            headers: { 'Content-Type': undefined },
            method: "POST",
            data:formDatas

        }).then((response)=>{
            $('#modalEdit').modal('hide');
            $scope.plan={}
            $scope.plan.types = $scope.types
            $scope.plan.sequences = $scope.sequences
            $scope.plan.items = []
            $scope.freePlan = false
            $scope.isExpire = false
            table.ajax.reload()
            swal({
                text:'El plan ha sido editado' ,
                type: "success",
                showCancelButton: false,
                showConfirmButton: false
            }).catch(swal.noop);
        }).catch(function (e) {
            console.log(e)
            swal({
                text:'algo salio mal, intente de nuevo' ,
                type: "warning",
                showCancelButton: false,
                showConfirmButton: false
            }).catch(swal.noop);
        });
    }
}]);