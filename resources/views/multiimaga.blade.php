<?php
use Illuminate\Support\Facades\Hash;
?>
@if($videoModels)
@foreach($videoModels as $videoModel)

<div><img src="storage/video/{{$videoModel->video}}"></div>
<div><?php echo Hash::make($videoModel->id);?></div>
@endforeach

@endif
