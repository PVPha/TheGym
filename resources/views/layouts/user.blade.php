<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/font-awesome.min.css" />
    <link rel="stylesheet" href="css/aos.css" />
    <!-- MAIN CSS -->
    <link rel="stylesheet" href="css/memberprofile.css" />
    <link rel="stylesheet" href="css/trainerprofile.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
        crossorigin="anonymous" />
    <title>Thông tin thành viên</title>
    <style>
        table td{
            height: 2.5rem;
            line-height: 2.5rem;
        }
    </style>
</head>

<body>
@yield('content')

<script>
    function validatePass(event){
        event.preventDefault();
        let send = true;
        let newPass = document.forms['changePass']['new_password'].value;
        let rePass = document.forms['changePass']['re_password'].value;
        if (newPass == '') {
            document.querySelector('.ernp').innerText = 'Mật khẩu không được rỗng!';
            send = false;
        }
        if (newPass != rePass) {
            document.querySelector('.error').innerText = 'Mật khẩu phải trùng nhau!';
            send = false;
        }
        if (send) {
            document.forms['changePass'].submit();
            // logout();
        }
    }
    function show(url,form) {
            let ele =  document.forms[form].querySelectorAll('.form-control')
            $.ajax({
                type: 'GET',
                url: url,
                dataType: 'html',
                success: function(data) {
                    let value = JSON.parse(data)[0];
                    console.log(value);
                    ele.forEach(e=>{
                        name = e.name
                        if (name != 'image') {
                            document.forms[`${form}`][`${name}`].value = `${value[name] == undefined ? '':value[name]}`;
                        }
                        if (name == 'image') {
                            let img = document.forms[`${form}`].querySelector('img');
                            if (img && value[name]) {
                                img.style.display = 'block';
                                img.src = value[name]
                            }
                        }
                        if (name == 'trainer_id') {
                            getTrainerType(form);
                        }
                        if(name == 'date_of_week'){
                            let date = value['date_of_week'].split(',');
                            date.forEach(d => {
                                let checkbox = document.forms[form].querySelectorAll('input[type="checkbox"]');
                                checkbox.forEach(che=>{
                                    if (che.value == d) {
                                        che.checked = true;
                                    }
                                })
                            });
                        }
                    })
                },
                error: function(data) {
                    console.log(data);
                }
            })
    }
    function hire(url,form) {
            let ele =  document.forms[form].querySelectorAll('.form-control')
            $.ajax({
                type: 'GET',
                url: url,
                dataType: 'html',
                success: function(data) {
                    let value = JSON.parse(data)[0];
                    console.log(value);
                    ele.forEach(e=>{
                        name = e.name
                        console.log(name);
                        if (name != 'image') {
                            document.forms[`${form}`][`${name}`].value = `${value[name] == undefined ? '':value[name]}`;
                        }
                        if(name == 'date_of_week'){
                            let date = value['date_of_week'].split(',');
                            console.log(date);
                            date.forEach(d => {
                                let checkbox = document.forms[form].querySelectorAll('input[type="checkbox"]');
                                let label = document.forms[form].querySelectorAll('.form-check-label')
                                checkbox.forEach((che, index)=>{
                                    if (che.value == d) {
                                        console.log(che);
                                        console.log(che.value);
                                        che.style.display = 'none'
                                        label[index].style.display = 'none'
                                    }
                                })
                            });
                        }
                    })
                },
                error: function(data) {
                    console.log(data);
                }
            })
    }
    function previewImg(name,form) {
        let file = document.forms[form].querySelector('input[name="image"]').files;
        console.log(file);
        if (file) {
            document.forms[form].querySelector('#'+name).style.display = 'block';
            document.forms[form].querySelector('#'+name).src = URL.createObjectURL(file[0]);
        }
    }
    function detail(url, table) {
        $.ajax({
                type: 'GET',
                url: url,
                dataType: 'html',
                success: function(data) {
                    let tr = ''
                    let value = JSON.parse(data);
                    console.log(value);
                    value.forEach(e=>{
                        if (table == 'trainer') {
                            tr += `<tr>
                                    <td>${e.name}  </td>
                                    <td>${e.gender}  </td>
                                    <td>${e.phone} </td>
                                    <td>${e.email} </td>
                                </tr>`
                        }
                        if (table == 'member') {
                            tr += `<tr>
                            <td>${e.class_name} </td>
                            <td>${e.room}</td>
                            <td>${e.start_date +' '+e.end_date}</td>
                            <td>${e.name}</td>
                            <td>${e.phone}</td>
                            <td>${e.email}</td>
                        </tr>`
                        }

                    })
                    document.querySelector('#detail_table').innerHTML = tr
                },
                error: function(data) {
                    console.log(data);
                }
            })
    }
    function getDOW(form) {
        let checkbox = document.forms[form].querySelectorAll('input[type="checkbox"]:checked');
            let value = []
            checkbox.forEach(c=>{
                if (!value.includes(c.value)) {
                    value.push(c.value);
                }
                console.log(value.toString());
                document.forms[form].querySelector('input[name="date_of_week"]').value = value.toString();
        })
    }
    function submitForm(name) {
            document.forms[`${name}`].submit();
    }

    function getID(id) {
        document.forms['addID']['member_id'].value = id;
        $.ajax({
                type: 'GET',
                url: 'index/'+id+'/edit',
                dataType: 'html',
                success: function(data) {
                    console.log(JSON.parse(data) );
                    let body = '';
                    JSON.parse(data).forEach(index=>{
                        body += `<tr> <td>${index.height}</td> <td>${index.weight}</td> <td>${index.chest}</td> <td>${index.waist}</td> <td>${index.butt}</td> <td>${index.left_hand}</td> <td>${index.right_hand}</td> <td>${index.left_leg}</td> <td>${index.right_leg}</td> <td>${index.date_measure}</td> <td > <a class="btn" data-toggle="modal" data-target="#updateID" onclick="show('index/${index.id}','updateID')"><i class="fas fa-edit"></i></a> <a class="btn" href="index/delete/${index.id}"><i class="fas fa-times"></i></a> </td> </tr>`
                    })
                    document.querySelector('.index-body').innerHTML = body;
                }
            })
    }
    </script>

    <!-- SCRIPTS -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/aos.js"></script>
    <script src="js/smoothscroll.js"></script>
    <script src="js/custom.js"></script>
</body>

</html>

