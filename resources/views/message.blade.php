@if(isset($post))
    <div class="alert alert-{{ $post->fecha->isLeapYear() ? 'success' : 'warning' }}" role="alert">
        <p>{{ _('El dia de la semana es')}} <strong>{{ $post->dayOfTheWeek('es') . '/' . $post->dayOfTheWeek('ca') }}</strong></p>
        <p>{{ _('Es un año bisiesto? ') }} <strong>{{ $post->fecha->isLeapYear() ? _('Sí') : _('No') }}</strong></p>
    </div>
@endif