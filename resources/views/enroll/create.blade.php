<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<div class="container">
    <div class="row">        
        <div class="col-md-12">
            <h1>Enroll Form</h1>
            <a href="/enroll"><button type="button" class="btn btn-primary" style="position: absolute;right: 22px;top: 10px;"> Go Back </button></a>
            <div class="alert alert-danger print-error-msg" style="display:none">
                <ul></ul>
            </div>
            <form class="enrollForm">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Enter Name">
                </div>
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" name="email" class="form-control" placeholder="Enter Email">
                </div>
                <div class="form-group">
                    <label for="mobile">Mobile Number</label>
                    <input type="text" name="mobile" class="form-control" placeholder="Enter Mobile">
                </div>
                <div class="form-group">
                    <label for="basic">Basic</label>
                    <input type="text" name="basic" class="form-control basic" placeholder="Enter Basic">
                </div>
                <div class="form-group">
                    <label for="hra">HRA</label>
                    <input type="text" name="hra" class="form-control hra" placeholder="Enter HRA">
                </div>
                <div class="form-group">
                    <label for="special_allowance">Special Allowance</label>
                    <input type="text" name="special_allowance" class="form-control special_allowance" placeholder="Enter Special Allowance">
                </div>
                <div class="form-group">
                    <label for="pf_deuction">PF Detuction</label>
                    <input type="text" name="pf_deuction" class="form-control pf_deuction" placeholder="Enter PF Detuction">
                </div>
                <div class="form-group">
                    <label for="total_earnings">Total Earnings</label>
                    <input type="text" name="total_earnings" class="form-control total_earnings" placeholder="Total Earnings" readonly>
                </div>
                <button class="btn btn-primary btn-submit">Submit</button>
            </form>
        </div>
    </div>
</div>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() { 
        $(".total_earnings").on('mouseenter', function(ev) {                          // Total Earnings Calculation
            var basic = parseInt($(".basic").val(), 10);
            var hra = parseInt($(".hra").val(), 10);
            var sa = parseInt($(".special_allowance").val(), 10);
            var pf = parseInt($(".pf_deuction").val(), 10);

            var total_earnings = (basic + hra + sa) - pf;

            $(".total_earnings").val(total_earnings);           
        });        

        $(".btn-submit").click(function(e){    
            console.log($(".enrollFrom").serialize()); 
            e.preventDefault();    
            $.ajax({
                url: "{{ url('/enroll') }}",
                type: "POST",
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data: $(".enrollForm").serialize(),
                success: function(data) {
                    console.log(data);
                    if($.isEmptyObject(data.error)){
                        location.href = window.location.origin+"/enroll";
                    }else{
                        printErrorMsg(data.error);
                    }
                }
            })
        }); 

        function printErrorMsg (msg) {
            $(".print-error-msg").find("ul").html('');
            $(".print-error-msg").css('display','block');
            $.each( msg, function( key, value ) {
                $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
            });
        }    
    })
</script>