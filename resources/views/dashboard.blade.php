<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <title>Dashboard</title>
</head>
<body>
    <div class="sidebar">
        <div class="sidebar-brand">
            <h2><span class="lab la-accusoft"> SDU</span></h2>
        </div>

        <div class="sidebar-menu">
            <ul>
                <li>
                    <a href="{{url('dashboard')}}" class="active"><span class="las la-igloo"></span><span> {{__('dashboard.dashboard')}}</span></a>
                </li>
                <li>
                    <a href="{{url('students')}}"><span class="las la-users"></span><span>  {{__('dashboard.students')}}</span></a>
                </li>
                <li>
                    <a href="{{url('grades')}}"><span class="las la-clipboard-list"></span><span>  {{__('dashboard.grades')}}</span></a>
                </li>
        
                <li>
                    <a href="{{url('messages')}}"><span class="las la-envelope"></span><span>  {{__('dashboard.messages')}}</span></a>
                </li>
                <li>
                    <a href="{{url('changeLang')}}"><span class="las la-language"></span><span>  {{__('dashboard.lang')}}</span></a>
                </li>

                <li>
                    <a href="{{url('welcome')}}"><span class="las la-user-circle"></span><span>  {{__('dashboard.logout')}}</span></a>
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

                {{__('dashboard.dashboard')}}
            </h2>

            <!-- <div class="search-wrapper">
                <span class="las la-search"></span>
                <input type="search" placeholder="Search here"> 
            </div> -->

            <div class="user-wrapper">
                <div>
                <h4>{{session('email')}}</h4>
                <small> {{__('dashboard.admin')}}</small>
                </div>
            </div>
        </header>

        <main>
            <div class="cards">
                <div class="card-single">
                    <div>
                        <h1>{{$numberOfstudents}}</h1>
                        <span> {{__('dashboard.students')}}</span>
                    
                    </div>
                    <div>
                        <span class="las la-users"></span>
                    </div>
                </div>

                <div class="card-single">
                    <div>
                        <h1>{{$avgGrade}}</h1>
                        <span> {{__('dashboard.avgGrade')}}</span>
                    </div>
                    <div>
                        <span class="las la-clipboard-list"></span>
                    </div>
                </div>

        
                <!-- <div class="card-single">
                    <div>
                        <h1>124</h1>
                        <span>Attendance</span>
                    </div>
                    <div>
                        <span class="las la-user-check"></span>
                    </div>
                </div> -->
            </div>

            <div class="recent-grid">
                <div class="projects">
                    <div class="card">
                        <div class="card-header">
                            <h3> {{__('dashboard.recentG')}}</h3>
                            <button> {{__('dashboard.see')}} <span class="las la-arrow-right"></span></button>
                        </div>

                        <div class="card-body">
                            <table width="100%">
                                <thead>
                                    <tr>
                                        <td> {{__('dashboard.id')}}</td>
                                        <td> {{__('dashboard.work')}}</td>
                                        <td> {{__('dashboard.grade')}}</td>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($grades as $student)
                                    <tr>
                                        <td>{{$student->student_id}}</td>
                                        <td>{{$student->work_name}}</td>
                                        <td>{{$student->grade}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="customers">
                    <div class="card">
                        <div class="card-header">
                            <h3> {{__('dashboard.newS')}}</h3>
                            <button> {{__('dashboard.see')}} <span class="las la-arrow-right"></span></button>
                        </div>

                        <div class="card-body">
                        @foreach($students as $stud)
                            <div class="customer">
                                <div class="info">
                                    <img src="" alt="">
                                    <div>
                                        <h4>{{$stud->name}}</h4>
                                        <small>{{$stud->course}}</small>
                                    </div>
                                </div>
                                <div class="contact">
                                    <span class="las la-user-circle"></span>
                                    <span class="las la-comment"></span>
                                    <span class="las la-phone"></span>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>