@php
$items = [
  ['text'=>'Trang chủ','route'=>url('/')],
  ['text'=>'Articles','route'=>route('articles.index')],
];
if (request()->routeIs('articles.create')) $items[] = ['text'=>'Tạo mới'];
if (request()->routeIs('articles.edit'))   $items[] = ['text'=>'Chỉnh sửa'];
@endphp

<nav aria-label="breadcrumb" style="margin:8px 0;color:#6b7280">
  @foreach($items as $i => $it)
    @if(!empty($it['route']))
      <a href="{{ $it['route'] }}">{{ $it['text'] }}</a>
    @else
      <span>{{ $it['text'] }}</span>
    @endif
    @if($i < count($items)-1) &nbsp; / &nbsp; @endif
  @endforeach
</nav>
