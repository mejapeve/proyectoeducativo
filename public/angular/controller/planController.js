MyApp.controller("PlanContoller", ["$scope", "$http", function($scope, $http) {

    $scope.plan={}
    $scope.plan.items=[]
    $scope.freePlan
    $scope.moments
    $scope.route
    $scope.routeDatable
    var table ;

    $scope.init = (route,routeDatable) => {
        $scope.route = route
        $scope.routeDatable = routeDatable
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
                {data: 'edit', className: 'text-center'},
            ]
        });
        new $.fn.dataTable.FixedHeader( table );
        $scope.freePlan = false;
        $http({
            url:'/get_types_plans/',
            method: "GET",
        }).
        then(function (response) {
            $scope.plan.types = response.data.data
        }).catch(function (e) {

        });
        $http({
            url:'/get_all_sequences/',
            method: "GET",
        }).
        then(function (response) {
            $scope.plan.sequences = response.data.data
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
        console.log(index,'index',$scope.plan.items)
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
            $scope.plan={}
            $scope.plan.items
            $scope.freePlan = false
            table.ajax.reload()
            swal({
                text:'El plan ha sido creado' ,
                type: "success",
                showCancelButton: false,
                showConfirmButton: false
            }).catch(swal.noop);

        }).catch(function (e) {
            swal({
                text:'algo salio mal, intente de nuevo' ,
                type: "warning",
                showCancelButton: false,
                showConfirmButton: false
            }).catch(swal.noop);
        });

    }

}]);