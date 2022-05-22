@extends('layouts.admin')
@section('title',"فن السكن | لوحة التحكم - اعدادات المستخدمين")
@section('content')
<div class="request">
    <div class="container">
        <div class="row">
            <div class="col-md-6 mt-5">
                <h2>عرض المستخدمين</h2>
                <p>مرحبا بك فى فن السكن .</p>
            </div>
        </div>
        <div class="shadow my-2">
            <table class="table table-bordered text-center">
                <thead>
                  <tr>
                    <th scope="col">كود</th>
                    <th scope="col">الأسم</th>
                    <th scope="col">الصلاحيات</th>
                    <th scope="col">تحرير</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($engs as $key=>$eng)
                    <tr>
                      <th scope="row">{{$eng->id}}</th>
                      <th>{{$eng->name}}</th>
                      <th>
                        @if ($eng->role == "admin")
                          مسئول                  
                        @endif
                        @if ($eng->role == "eng")
                            مهندس
                        @endif
                        @if ($eng->role == "accountant")
                        محاسب 
                        @endif
                        @if ($eng->role == "client")
                          عميل                  
                        @endif
                      <td class="d-flex align-items-center justify-content-arround">
                        <a class="btn btn-link m-auto" href="{{route('user-manage.show',$eng->id)}}">تحرير</a>
                      </td>                          
                    </tr>
                    @endforeach
                </tbody>
              </table>
              <div class="mt-5">
                {{ $engs->links() }}
              </div>
        </div>
    </div>
</div>
@endsection