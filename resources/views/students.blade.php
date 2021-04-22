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
                    <a href="{{url('dashboard')}}" class="active"><span class="las la-igloo"></span><span> {{__('students.dashboard')}}</span></a>
                </li>
                <li>
                    <a href="{{url('students')}}"><span class="las la-users"></span><span> {{__('students.students')}}</span></a>
                </li>
                <li>
                    <a href="{{url('grades')}}"><span class="las la-clipboard-list"></span><span> {{__('students.grades')}}</span></a>
                </li>
                <li>
                    <a href="{{url('messages')}}"><span class="las la-envelope"></span><span> {{__('students.messages')}}</span></a>
                </li>
                <li>
                    <a href="{{url('changeLang')}}"><span class="las la-language"></span><span>  {{__('students.lang')}}</span></a>
                </li>
                <li>
                    <a href="{{url('welcome')}}"><span class="las la-user-circle"></span><span> {{__('students.logout')}}</span></a>
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

                {{__('students.dashboard')}}
            </h2>

            <!-- <div class="search-wrapper">
                <span class="las la-search"></span>
                <input type="search" placeholder="Search here"> 
            </div> -->

            <div class="user-wrapper">
                <div>
                <h4>{{session('email')}}</h4>
                <small>{{__('students.admin')}}</small>
                </div>
            </div>
        </header>
        <main>
        <a href="{{url('/studentadd')}}" class="btn btn-primary">{{__('students.add')}}</a>
        <div class="container-fluid">
            <section class="col">
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">{{__('students.id')}}</th>
                    <th scope="col">{{__('students.name')}}</th>
                    <th scope="col">{{__('students.surname')}}</th>
                    <th scope="col">{{__('students.email')}}</th>
                    <th scope="col">{{__('students.course')}}</th>
                    <th scope="col">{{__('students.image')}}</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($students as $s)
                    <tr>
                    <td scope="row">{{$s->student_id}}</td>
                    <td>{{$s->name}}</td>
                    <td>{{$s->surname}}</td>
                    <td>{{$s->email}}</td>
                    <td>{{$s->course}}</td>
                    <td><img src="{{ asset('uploads/' . $s->image) }}" alt="Image" width="100" height="100"></td>
                    <td>
                        <a href="{{url('/students/edit/'.$s->id)}}" class="btn btn-sm btn-warning">{{__('students.edit')}}</a>
                        <a href="{{url('/students/delete/'.$s->id)}}" class="btn btn-sm btn-danger">{{__('students.delete')}}</a>
                    </td>
                    </tr>
                @endforeach
                </tbody>
                </table>
            </section>
        </div>
        </main>
    </div>
</body>
</html>