<?php require APPROOT . '/views/includes/header.php'; ?>

<table class="table table-striped table-dark mt-3">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Fullname</th>
      <th scope="col">Policy</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">DateOfBirth</th>
      <th scope="col">Phone Number</th>
      <th scope="col">From Date</th>
      <th scope="col">To Date</th>
    </tr>
  </thead>
  <tbody>
   <?php foreach($data['policies'] as $policy): ?>
    <tr>
      <th scope="row"><?php echo $policy->id; ?></th>
      <td><?php echo $policy->fullname; ?></td>
      <td><?php echo $policy->policy; ?></td>
      <td><?php echo $policy->firstname; ?></td>
      <td><?php echo $policy->lastname; ?></td>
      <td><?php echo $policy->dateofbirth; ?></td>
      <td><?php echo $policy->phone; ?></td>
      <td><?php echo $policy->from_date; ?></td>
      <td><?php echo $policy->to_date; ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<?php require APPROOT . '/views/includes/footer.php'; ?>
