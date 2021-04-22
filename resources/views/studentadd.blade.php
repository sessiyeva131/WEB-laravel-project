<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title>Students</title>
</head>
<body>
    <div class="sidebar">
        <div class="sidebar-brand">
            <h2><span class="lab la-accusoft"> SDU</span></h2>
        </div>

        <div class="sidebar-menu">
            <ul>
                <li>
                    <a href="{{url('dashboard')}}" class="active"><span class="las la-igloo"></span><span> {{__('studentadd.dashboard')}}</span></a>
                </li>
                <li>
                    <a href="{{url('students')}}"><span class="las la-users"></span><span> {{__('studentadd.students')}}</span></a>
                </li>
                <li>
                    <a href="{{url('grades')}}"><span class="las la-clipboard-list"></span><span> {{__('studentadd.grades')}}</span></a>
                </li>
                <li>
                    <a href="{{url('messages')}}"><span class="las la-envelope"></span><span> {{__('studentadd.messages')}}</span></a>
                </li>
                <li>
                    <a href="{{url('changeLang')}}"><span class="las la-language"></span><span>  {{__('studentadd.lang')}}</span></a>
                </li>
                <li>
                    <a href="{{url('welcome')}}"><span class="las la-user-circle"></span><span> {{__('studentadd.logout')}}</span></a>
                </li>
            </ul>
        </div>
    </div>

    <div class="main-content">
        <header>
            <h2>
                <label for="">
                    <span class="las la-bars"></span>
                </label>

                {{__('studentadd.dashboard')}}
            </h2>

            <!-- <div class="search-wrapper">
                <span class="las la-search"></span>
                <input type="search" placeholder="Search here"> 
            </div> -->

            <div class="user-wrapper">
                <div>
                <h4>{{session('email')}}</h4>
                <small>{{__('studentadd.admin')}}</small>
                </div>
            </div>
        </header>

        <main>
            <form action="{{ url('/students/store') }}" enctype="multipart/form-data" method="post">
            @csrf
                <div class="mb-3">
                    <label name="student_id" class="form-label">{{__('studentadd.id')}}: </label>
                    <input type="text" name="student_id" class="form-control">
                    <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">{{__('studentadd.name')}}: </label>
                    <input type="text" name="name" class="form-control" >
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1"  class="form-label">{{__('studentadd.surname')}}: </label>
                    <input type="text" name="surname" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1"  class="form-label">{{__('studentadd.email')}}: </label>
                    <input type="email" name="email" class="form-control" >
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1"  class="form-label">{{__('studentadd.course')}}: </label>
                    <input type="text" name="course" class="form-control" >
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1"  class="form-label">{{__('studentadd.image')}}: </label>
                    <input type="file" name="image" class="custom-file-input">
                </div>
                <button type="submit" class="btn btn-primary">{{__('studentadd.add')}}</button>
                </form>
        </main>
    </div>
</body>
</html>