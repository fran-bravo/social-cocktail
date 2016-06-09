@extends('plantillas.user.sections.mainUser')
@section('title','Manual')
@section('titleComplement','Social-Cocktail')
@section('headerContent','Cristalería')
@section('headerDescription',' ')
@section('contentPage')

    <div class="row">
        <div class="col-md-6">
            <div class="box">
                <div class="box-body">
                    @foreach($cristales as $cristal)
                        <div class="attachment-block clearfix">
                            <img class="attachment-img" src="/imagenes/cocteles/defaultCoctel.jpg" alt="Attachment Image">

                            <div class="attachment-pushed">
                                <h4 class="attachment-heading"><a href="">{{$cristal->nombre}}</a></h4>

                                <div class="attachment-text">
                                    <p>{{$cristal->descripcion}}<a href="#">more</a></p>
                                </div>
                                <!-- /.attachment-text -->
                            </div>
                            <!-- /.attachment-pushed -->
                        </div>
                    @endforeach
                </div>
                <!-- /.box-body -->
            </div>
        </div>
        <div class="col-md-6">
        </div>
    </div>
@endsection

