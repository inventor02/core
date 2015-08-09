@extends('layout')

@section('content')

<p>
    You can add  secondary emails to your VATSIM profile, at which you'd like to receive copies of <em>some</em> emails we dispatched.  Secondary emails will <strong>not</strong> receive
    emails surrounding your account security or credentials.
</p>

<div class="row">

    <div class="col-md-7 col-md-offset-2">
        {!! Form::open(["route" => ["mship.manage.email.add"], "class" => "form-horizontal"]) !!}
        <div class="form-group">
            <label class="col-sm-5 control-label" for="new_email">New Email</label>

            <div class="col-sm-7">
                <input class="form-control" type="text" id="new_email" name="new_email"
                       placeholder="I_sleep@gmail.com">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-5 control-label" for="new_email2">Confirm New Email</label>

            <div class="col-sm-7">
                <input class="form-control" type="text" id="new_email2" name="new_email2"
                       placeholder="I_sleep@gmail.com">
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-5 col-sm-7">
                <button type="submit" class="btn btn-default" name="processemail_add"
                        value="new_email_add">Proceed
                </button>
            </div>
        </div>
        </form>
    </div>
</div>
@stop