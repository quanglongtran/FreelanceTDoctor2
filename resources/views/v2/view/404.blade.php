@extends('v2/structor/main',['title'=> 'Page not found'])
@section('content')
<div class="main-A">
	<div class="abu-cnt">
		<div id="top">
            <div class="link">
                <div class="nav">
                    <ul>
                        <li><a href="/">Trang chủ</a></li>
                        <li>&nbsp;>&nbsp;</li>
                        <li><a href="/">404</a></li>
                    </ul> 
                    
                </div>
            </div> 
	    </div><!-- #top -->

	    <div class="top-new">
            <br/>
            <br/>
            <br/>

                    <h2 class="text-center" style="font-size: 50px;">404</h2>
                 <?php echo time(); ?>
               
                    <br />
                    <br />
                
            </div>
	</div>
</div>
<br><br>
@endsection