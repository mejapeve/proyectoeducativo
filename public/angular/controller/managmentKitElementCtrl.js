MyApp.controller("managmentKitElementCtrl", ["$scope", "$http", function($scope, $http) {
    /*****
        Variables para leer el directorio
     */
    $scope.table
    $scope.typeEdit = null
    $scope.mbImageShow = false
    $scope.directoryPath = null
    $scope.directoryPath2 = null
    $scope.mbImageShow2 = false
    $scope.dataJstree = {};
    $scope.cover = ''
    $scope.sequences = null
    $scope.moments = null
    $scope.sequenceSelected = null
    $scope.momentSelected = null
    $scope.arraySequenceMoment = []
    $scope.onChangeFolderImage = function (path,callback) {
        $http.post('/conexiones/admin/get_folder_image', { 'dir': path }).then(function (response) {
            var list = response.data.scanned_directory;
            $scope.directoryPath = response.data.directory;
            $scope.directory = [];
            $scope.filesImages = [];
            var item = null;
            for (indx in list) {
                item = list[indx];
                if (item.includes('.png') || item.includes('.jpg') || item.includes('.jpeg')) {
                    var filedir = $scope.directoryPath + '/' + item;
                    $scope.filesImages.push({ 'type': 'img', 'url_image': filedir });
                }
                else if (!item.includes('.')) {
                    var dir = $scope.directoryPath + '/'+ item;
                    dir = dir.replace('//','/');
                    $scope.directory.push({ 'type': 'dir', 'name': item, 'dir': dir });
                }
                else if (item === '..') {
                    var dir = getLastPath($scope.directoryPath);
                    $scope.directory.push({ 'type': 'dir', 'name': item, 'dir': dir });
                }
            }
            if(callback) callback(response.data);
        },function(e){
            var message = 'Error consultando el directorio';
            if(e.message) {
                message += e.message;
            }
            $scope.errorMessage = angular.toJson(message);
            $scope.directoryPath = null;
        });
    }
    $scope.onChangeFolderImage2 = function (path,callback) {
        $http.post('/conexiones/admin/get_folder_image', { 'dir': path }).then(function (response) {
            var list = response.data.scanned_directory;
            $scope.directoryPath2 = response.data.directory;
            $scope.directory2 = [];
            $scope.filesImages2 = [];
            var item = null;
            for (indx in list) {
                item = list[indx];
                if (item.includes('.png') || item.includes('.jpg') || item.includes('.jpeg')) {
                    var filedir = $scope.directoryPath2 + '/' + item;
                    $scope.filesImages2.push({ 'type': 'img', 'url_image': filedir });
                }
                else if (!item.includes('.')) {
                    var dir = $scope.directoryPath2 + '/'+ item;
                    dir = dir.replace('//','/');
                    $scope.directory2.push({ 'type': 'dir', 'name': item, 'dir': dir });
                }
                else if (item === '..') {
                    var dir = getLastPath($scope.directoryPath2);
                    $scope.directory2.push({ 'type': 'dir', 'name': item, 'dir': dir });
                }
            }
            if(callback) callback(response.data);
        },function(e){
            var message = 'Error consultando el directorio';
            if(e.message) {
                message += e.message;
            }
            $scope.errorMessage2 = angular.toJson(message);
            $scope.directoryPath2 = null;
        });
    }
    function getLastPath(directory) {
        var dirSplit = directory.split('/');
        var dirName = '';
        for (var i = 0; i < dirSplit.length - 1; i++) {
            if (dirName.length > 0) dirName += '/';
            dirName += dirSplit[i];
        }
        return dirName;
    }
    $scope.onImgChange = function (field) {
        $scope.applyChange = true;
        $scope.cover = field.url_image;
        $scope.mbImageShow = false
        swal({
            text: 'Imagen seleccionada',
            type: "success",
            showCancelButton: false,
            showConfirmButton: false
        }).catch(swal.noop);
    }
    /** fin varilables para leer el directorio */
    $scope.element={}
    $scope.actionElement = 'Crear'
    $scope.route

    $scope.init = function(route) {
        $scope.route = route
        $('.d-none-result').removeClass('d-none');
        $scope.table = $('#myTable').DataTable({
            processing: true,
            serverSide: false,
            responsive: true,
            language: {
                "decimal": "",
                "emptyTable": "No hay información",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
                "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
                "infoFiltered": "",
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
            'ajax': {
                'url': '/conexiones/admin/get_kit_element_dt/',
                'dataSrc': function (json) {
                    var return_data = new Array();
                    var row = product = null;
                    for(var i=0 ; i<json.elements.length; i++){
                        row = json.elements[i];
                        return_data.push({
                            'name':row.name,
                            'description':row.description,
                            'type':'Elemento',
                            'price':row.price,
                            'quantity':row.quantity,
                            'edit':'',
                            'view':''
                        })

                    }
                    for(var i=0 ; i<json.kits.length; i++){
                        row = json.kits[i];
                        return_data.push({
                            'name':row.name,
                            'description':row.description,
                            'type':'Kit',
                            'price':row.price,
                            'quantity':row.quantity,
                            'edit':'',
                            'view':''
                        })

                    }
                    return return_data;
                }
            },
            'columns': [
                {data: 'name', className: 'text-left'},
                {data: 'description', className: 'text-left'},
                {data: 'type', className: 'text-center'},
                {data: 'price', className: 'text-cneter'},
                {data: 'quantity', className: 'text-center'},
                {data: 'edit', className: 'text-right'},
                {data: 'view', className: 'text-right'},

            ]
        });

        var path = 'images/designerAdmin'
        $scope.onChangeFolderImage(path)
        $scope.onChangeFolderImage2(path)
        $http({
            url:'/get_all_sequences/',
            method: "GET",
        }).
        then(function (response) {
            $scope.sequences = response.data.data
        }).catch(function (e) {

        });
    }
    $scope.sequenceChange = (data) => {
        data = data.split('|')[0]
        const result = ($scope.sequences).filter(res=>res.id == data ).map(ele=>ele.moments);
        $scope.moments =  result[0]
    }
    $scope.addSequenceMoment = () => {
        let dataSequenceSelected =  $scope.sequenceSelected.split('|')
        let dataMomentSelected = []
        let momentsName = '';
        angular.forEach($scope.momentSelected, function (keyword, key) {
            keyword =  keyword.split('|')
            momentsName = momentsName+keyword[1]+','
            dataMomentSelected.push({
                'id':keyword[0],
                'name':keyword[1],
            })
        });
        $scope.arraySequenceMoment.push(
            {
                'id':dataSequenceSelected[0],
                'name':dataSequenceSelected[1],
                'moments': dataMomentSelected,
                'moments_name': momentsName,

            }
            );
    }

    $scope.actionModalElement = (action) => {

        if(action === 'Crear'){
            $scope.actionElement = 'Crear'
            $('#exampleModal').modal('show');
        }else{
            $scope.actionElement = 'Editar'

        }
    }

    $scope.createOrUpdateElement = (action) => {
        $http.post('/conexiones/admin/get_folder_image', { 'dir': $scope.directoryPath2 }).then(function (response) {
            var list = response.data.scanned_directory;
            var directoryPathModal = response.data.directory;
            var item = null;
            $scope.element.url_slider_images = ''
            for (indx in list) {
                item = list[indx];
                if (item.includes('.png') || item.includes('.jpg') || item.includes('.jpeg')) {
                    $scope.element.url_slider_images = $scope.element.url_slider_images+'|'+directoryPathModal+''+item
                }
            }
            var data = new FormData();
            data.append('name',$scope.element.name);
            data.append('price',$scope.element.cost);
            data.append('quantity',$scope.element.quantity);
            data.append('url_image',$scope.cover);
            data.append('url_slider_images',$scope.element.url_slider_images);
            data.append('description',$scope.element.description);
            let new_startDate= new Date($scope.element.init_date);
            let date = moment(new_startDate).format('YYYY-MM-DD');
            data.append('init_date',date)
            data.append('arraySequenceMoment',JSON.stringify($scope.arraySequenceMoment));
            data.append('action',action );

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: $scope.route+'/'+action,
                data: data,
                cache: false,
                contentType: false,
                processData: false,
                method: 'POST',
                type: 'POST',
                success: function (response, xhr, request){
                    if(response.status === 'successfull'){
                        $('#exampleModal').modal('hide');
                        $scope.element = {}
                        $scope.cover = ''
                        $scope.arraySequenceMoment = []
                        $scope.sequenceSelected = null
                        $scope.momentSelected = null
                        $scope.table.ajax.reload()
                        $scope.swalfunction(response.message,"success")
                    }else{
                        $scope.swalfunction(response.message,"warning")
                    }
                },
                error: function (response, xhr, request) {
                    $scope.swalfunction('Algo salio mal',"warning")
                }
            });
        })

    }
    $scope.swalfunction = (text,type) => {
        swal({
            text: text,
            type: type,
            showCancelButton: false,
            showConfirmButton: false
        }).catch(swal.noop);
    }

}]);


