<?php require APPROOT . '/views/includes/header.php'; ?>
<script type="text/javascript">
    var datefield = document.createElement("input");
    datefield.setAttribute("type", "date");
    if (datefield.type != "date") { //if browser doesn't support input type="date", load files for jQuery UI Date Picker
        document.write('<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />\n')
        document.write('<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"><\/script>\n')
        document.write('<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"><\/script>\n')
    }

</script>

<script>
    if (datefield.type != "date") { //if browser doesn't support input type="date", initialize date picker widget:
        jQuery(function($) { //on document.ready
            $('#from').datepicker();
            $('#to').datepicker();
            $('#dateofbirth').datepicker();
        })
    }

</script>
<div class="row">
    <div class="col-md-6 mx-auto">
        <div class="card card-body bg-light mt-1">
            <h2>
                <?php echo $_SESSION['customer_name']; ?>
            </h2>
            <p>Please fill out this form to buy travel policy</p>
            <form action="<?php echo URLROOT; ?>/policies/index" method="post">
                <div class="form-group">
                    <label for="fullname">Full Name: <sup>*</sup></label>
                    <input type="text" name="fullname" class="form-control form-control-lg <?php echo(!empty($data['fullname_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['fullname']; ?>">
                    <span class="invalid-feedback"><?php echo $data['fullname_err']; ?></span>
                </div>
                <div class="form-group">
                    <label for="policy">Choose your policy: <sup>*</sup></label>
                    <select name="policy" onchange="select_options();" id="select" class="form-control form-control-lg">
                        <option value="">-</option>
                        <option value="Individual">Individual</option>
                        <option value="Group">Group</option>
                    </select>

                </div>
                <div class="form-group" style="display:none;" id="dynamicInput">





                </div>


                <div class="form-group">
                    <label for="phone">Phone Number: <sup>*</sup></label>
                    <input type="text" name="phone" class="form-control form-control-lg <?php echo(!empty($data['phone_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['phone']; ?>">
                    <span class="invalid-feedback"><?php echo $data['phone_err']; ?></span>
                </div>
                <div class="form-group">
                    <label for="from_date">Travel Date From: <sup>*</sup></label>
                    <input type="date" name="from_date" id="from" class="form-control form-control-lg" onchange="display_date();">
                </div>

                <div class="form-group">
                    <label for="to_date">Travel Date To: <sup>*</sup></label>
                    <input type="date" name="to_date" id="to" class="form-control form-control-lg">
                </div>

                <div class="row">
                    <div class="col">
                        <input type="submit" class="btn btn-success btn-block" value="Submit">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
