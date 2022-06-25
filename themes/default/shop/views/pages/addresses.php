<style>
    td , th{
        text-align: center;
    }
    .table td{
        padding: 1.3rem !important;
        color: #5d5c5c;
    }
    .color_green{
        color:green;
    }
</style>
<section class="section_top">
    <div class="row">
        <div class="col-6"><h4>List Addresses</h4></div>
        <div class="col-6"><div class="product-call" style="float:right"><a href="<?=base_url('add_address')?>">ADD NEW ADDRESS</a></div></div>
    </div>
            <table class="table table-bordered">
                <thead>
                    <th>#</th>
                    <th>Type</th>
                    <th>Address</th>
                    <th>Default</th>
                    <th>Actions</th>
                </thead>
                <tbody>
                    <?php 
                    if(!empty($Addresses)){
                        $i = 1 ;
                        foreach ($Addresses as $key) {
                    ?>
                    <tr>
                        <td><?=$i?></td>
                        <td><?=$key->AddressSubType?></td>
                        <td><?=$key->Address1?></td>
                        <td><?=$key->IsDefault == 1 ? '<span class="color_green">Default</span>' : '<a href="'.base_url('defaultAddress/'.$key->Id.'/1').'">Make Default</a>'?></td>
                        <td><a href="<?=base_url('deleteAddress/'.$key->Id)?>"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                    </tr>
                    <?php $i++; } } else{?>
                        <tr><td colspan="4">No Address Found</td></tr>
                        <?php        
                            } ?>
                </tbody>
            </table>
</section>