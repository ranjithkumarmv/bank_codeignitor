<div class="container-fluid">
	<div class="row">
		<div class="col-sm-3"></div>
<div class="col-lg-6 col-sm-6">
    <div class="card hovercard">
        <div class="card-background">
            <img class="card-bkimg" alt="" src="http://lorempixel.com/100/100/people/9/">
            <!-- http://lorempixel.com/850/280/people/9/ -->
        </div>
        <div class="useravatar">
            <img alt="" src="<?php echo base_url('/images/slide4.png'); ?>">
        </div>
        <div class="card-info"> <span class="card-title"><?php echo ucfirst($_SESSION['username']); ?> 's Account Dashboard</span>

        </div>
    </div>
    <div class="btn-pref btn-group btn-group-justified btn-group-lg" role="group" aria-label="...">
        <div class="btn-group" role="group">
            <button type="button" id="stars" class="btn btn-primary" href="#tab1" data-toggle="tab"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                <div class="hidden-xs">My Profile</div>
            </button>
        </div>
        <div class="btn-group" role="group">
            <button type="button" id="favorites" class="btn btn-default" href="#tab2" data-toggle="tab"><span class="glyphicon glyphicon-heart" aria-hidden="true"></span>
                <div class="hidden-xs">Account Details</div>
            </button>
        </div>
        <div class="btn-group" role="group">
            <button type="button" id="following" class="btn btn-default" href="#tab3" data-toggle="tab"><span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                <div class="hidden-xs">Banking</div>
            </button>
        </div>
    </div>

        <div class="well">
      <div class="tab-content">
        <div class="tab-pane fade in active" id="tab1">
          <h5>My Name : <?php echo $mydetails['username']; ?><br><br>My Email : <?php echo $mydetails['email']; ?></h5>
        </div>
        <div class="tab-pane fade in" id="tab2">
          <h5>My Account No : <?php echo $myaccount['accountno']; ?><br><br>IFSC : <?php echo $myaccount['ifsccode']; ?><br><br>Net Balance in RS : <?php echo $myaccount['netbalance']; ?></h5>
       
        </div>
        <div class="tab-pane fade in" id="tab3">
          <h3><center>
          <a href="<?= base_url('myaccount/transcations') ?>" class="btn btn-warning" role="button">View My Transcations</a>
          <a href="<?= base_url('myaccount/credit') ?>" class="btn btn-primary" role="button">Credit Amount</a>
          <a href="<?= base_url('myaccount/debit') ?>" class="btn btn-success" role="button">Debit Amount</a>
          <a href="<?= base_url('myaccount/neft') ?>" class="btn btn-info" role="button">Transfer NEFT</a>   </center></h3>
        </div>
      </div>
    </div>
    </div>
    <div class="col-sm-3"></div>
    </div>
    </div>
     <br>   
     
      
