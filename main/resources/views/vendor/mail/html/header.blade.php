<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Dotcoinverse')
<img src="{{ Config::getFile('logo', 'email.png', true) }}" class="logo" alt="Dotcoinverse">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
