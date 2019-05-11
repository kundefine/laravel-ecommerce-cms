<?php
    $link = '/user/add-shipping-address';
    $previousAddress = null;
    $userAddressExits = auth()->user()->addressExits();
    if($userAddressExits) {
        $link = '/user/add-shipping-address-update';
        $previousAddress = auth()->user()->getAddress->first();
    }
?>

<form action="{{ $link }}" method="POST">
    @csrf
    <div class="card">
        <div class="card-header">
            <p class="m-0">Your Shipping Address</p>
        </div>
        <div class="card-body">
            <input type="hidden" name="user_id" value="{{ auth()->id() }}">
            <div class="form-group">
                <label for="">Phone</label>
                <input type="text" class="form-control" name="phone" placeholder="Your Phone" required value="{{ $userAddressExits ? $previousAddress->phone : '' }}">
            </div>

            <div class="form-group">
                <label for="">Delivery Location</label>
                <select name="location" id="" class="form-control" required>
                    <option
                        value="inside_dhaka"
                        <?php
                            if($userAddressExits) {
                                if($previousAddress->location === 'inside_dhaka') {
                                    echo 'selected';
                                }
                            }
                        ?>
                    >
                        Inside Dhaka City

                    </option>
                    <option value="outside_dhaka"
                        <?php
                            if($userAddressExits) {
                                if($previousAddress->location === 'outside_dhaka') {
                                    echo 'selected';
                                }
                            }
                        ?>
                    >
                        Outside Dhaka City
                    </option>
                </select>
            </div>
            <div class="form-group">
                <label for="">Division</label>
                <select name="division" id="" class="form-control" required>
                    <option value="">Select One</option>
                    <option
                        value="Barishal"
                        <?php
                            if($userAddressExits) {
                                if($previousAddress->division === 'Barishal') {
                                    echo 'selected';
                                }
                            }
                        ?>
                    >
                        Barishal
                    </option>
                    <option value="Chattogram"
                        <?php
                            if($userAddressExits) {
                                if($previousAddress->division === 'Chattogram') {
                                    echo 'selected';
                                }
                            }
                        ?>

                    >
                        Chattogram
                    </option>
                    <option value="Dhaka"
                        <?php
                            if($userAddressExits) {
                                if($previousAddress->division === 'Dhaka') {
                                    echo 'selected';
                                }
                            }
                        ?>
                    >
                        Dhaka
                    </option>
                    <option value="Khulna"
                        <?php
                            if($userAddressExits) {
                                if($previousAddress->division === 'Dhaka') {
                                    echo 'selected';
                                }
                            }
                        ?>
                    >
                        Khulna
                    </option>
                    <option value="Mymensingh"
                    <?php
                        if($userAddressExits) {
                            if($previousAddress->division === 'Mymensingh') {
                                echo 'selected';
                            }
                        }
                        ?>
                    >
                        Mymensingh
                    </option>
                    <option value="Rajshahi"
                        <?php
                            if($userAddressExits) {
                                if($previousAddress->division === 'Rajshahi') {
                                    echo 'selected';
                                }
                            }
                        ?>
                    >
                        Rajshahi
                    </option>
                    <option value="Rangpur"
                        <?php
                            if($userAddressExits) {
                                if($previousAddress->division === 'Rangpur') {
                                    echo 'selected';
                                }
                            }
                        ?>
                    >
                        Rangpur
                    </option>
                    <option value="Sylhet"
                        <?php
                            if($userAddressExits) {
                                if($previousAddress->division === 'Sylhet') {
                                    echo 'selected';
                                }
                            }
                        ?>
                    >
                        Sylhet
                    </option>
                </select>
            </div>
            <div class="form-group">
                <label for="">City</label>
                <input type="text" name="city" id="" class="form-control" placeholder="City" required value="@if($userAddressExits) {{$previousAddress->city}} @endif">
                <small id="helpId" class="text-muted">Help text</small>
            </div>

            <div class="form-group">
                <label for="">Area</label>
                <input type="text" name="area" id="" class="form-control" placeholder="Area" required value="@if($userAddressExits) {{$previousAddress->area}} @endif">
            </div>

            <div class="form-group">
                <label for="">Address</label>
                <textarea type="text" name="address" id="" class="form-control" placeholder="For Example: House# 123, Street# 123, ABC Road">@if($userAddressExits) {{$previousAddress->address}} @endif</textarea>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary btn-block">
                Save
            </button>
            {{--<a href="/user/shiping-address/edit" class="fa fa-edit" style="float: right"></a>--}}
        </div>
    </div>
</form>