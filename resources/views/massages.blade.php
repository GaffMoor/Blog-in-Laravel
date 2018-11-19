@extends('layouts.app')

@section('content')
    
<h1>Massages</h1>

<input type="button" onclick="notifSet ()" value="Notification">
	
<script>
	function notifyMe () {
		var notification = new Notification ("Thaks For Watching My channel", {
			tag : "ache-mail",
			body : "Murad.Laravel.com",
			icon : "https://itproger.com/img/notify.png"
		});
	}
	
	function notifSet () {
		if (!("Notification" in window))
			alert ("Ваш браузер не поддерживает уведомления.");
		else if (Notification.permission === "granted")
			setTimeout(notifyMe, 2000);
		else if (Notification.permission !== "denied") {
			Notification.requestPermission (function (permission) {
				if (!('permission' in Notification))
					Notification.permission = permission;
				if (permission === "granted")
					setTimeout(notifyMe, 2000);
			});
		}
	}
</script>
@if (count($massages) > 0)
@foreach ($massages as $massage)
    <ul class="list-group">
        <li class="list-group-item">
            Name:{{$massage->name}}
        </li>
        <li class="list-group-item">
            Email:{{$massage->email}}
        </li>
        <li class="list-group-item">
            Massage:{{$massage->massage}}
        </li>
    </ul>
@endforeach
    
@endif
    @endsection

@section('sidebar')
    @parent
    <p>This is parent sidebar</p>
@endsection


