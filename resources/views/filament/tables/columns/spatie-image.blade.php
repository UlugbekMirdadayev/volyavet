<div>
    @php
    $state = $getState();
    $record = $getRecord();
    $name = $getName();

    $gt = \App\Models\AboutUs::where($name, $state)->first();

    //echo '<pre>';
    //var_dump($gt->getMedia($name)->first()->getUrl()); exit;

    $media = $gt->getMedia($name)->first();

    @endphp

    @if ($media)
    <img src="{{ $media->getUrl()}}" alt="Image" width="100" height="100">
    @endif
</div>
