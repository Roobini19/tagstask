<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<div class="container">
    <div class="row">
        <h1>Enroll Form</h1>
        <a href="/enroll/create"><button type="button" class="btn btn-primary" style="position: absolute;right: 22px;top: 10px;"> Enroll Now </button></a>
        <table class="table">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Mobile</th>
            <th scope="col">Basic</th>
            <th scope="col">HRA</th>
            <th scope="col">Special Allowance</th>
            <th scope="col">PF Deduction</th>
            <th scope="col">Total Earnings</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($enroll as $i => $er)
                <tr>
                <th scope="row">{{$i+1}}</th>
                <td>{{$er->name}}</td>
                <td>{{$er->email}}</td>
                <td>{{$er->mobile}}</td>
                <td>{{$er->basic}}</td>
                <td>{{$er->hra}}</td>
                <td>{{$er->special_allowance}}</td>
                <td>{{$er->pf_deuction}}</td>
                <td>{{$er->total_earnings}}</td>
                <td>
                    <a href="{{ route('enroll.edit',$er->id) }}"><span class="btn btn-warning">Edit</span></a>
                    <form role="form" action="{{ route('enroll.destroy',$er->id) }}" method="post">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>                    
                </td>
                </tr>
            @endforeach
        </tbody>
        </table>
    </div>
</div>

<script type="text/javascript">
    
</script>