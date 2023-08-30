<?php if (get_plugin_options('contact_plugin_active')) : ?>

    <div id="form_success" style="background: green; color: white;"></div>
    <div id="form_errorr" style="background: red; color: white;text-align:right;"></div>

    <!-- <div id="signupForm" style="display: flex; flex-direction:column; width: 30%;">
    <label for="phoneNumber" id="phoneLabel" style="text-align: right; margin-bottom: 10px;">شماره تلفن خود را وارد کنید</label>
    <input type="tel" id="phoneNumber">
    <button id="signUpBtn" type="submit" style="margin-top: 10px;">ارسال کد</button>
</div> -->
    <!-- <div id="codeBox" style="display: flex; flex-direction:column; width: 30%;">
    <label for="phoneNumber" id="phoneLabel" style="text-align: right; margin-bottom: 10px;">کد ارسال شده را وارد کنید</label>
    <input type="tel" id="sentCode">
    <button id="submitCode" type="submit" style="margin-top: 10px;">ثبت نام</button>
</div> -->
    <form id="advForm" style="display: flex; flex-direction: column; padding: 30px">


        <?php wp_nonce_field('wp_rest'); ?>
        <div id="firstStep" style="display: flex; flex-direction: column;">
        <label for="First Name">First Name</label>
        <input type="text" name="firstName">


        <label for="Last Name">Last Name</label>
        <input type="text" name="lastName">


        <label for="passport Picture">Passport Picture</label>
        <input type="file" name="passport">

        <p style="color: red; text-align:right">توجه: در صورت تغییر اسم و فامیل لطفا نام قبلی را درج فرمایید</p>
        <textarea name="changeName" id="changeName" cols="30" rows="10" placeholder="در این کادر نام قبلی خود را به همراهتوضیحات مربوط به این تغییر نام درج فرمایید." style="text-align: right;"></textarea>
        <div style="margin-top: 10px;">
            <button id="next">بعدی</button>
        </div>

        </div>
        

        <div id="secondStep" style="display: flex; flex-direction: column;">
        <label for="First Name">جنسیت</label>
        <input type="text" name="firstName">


        <label for="Last Name">Last Name</label>
        <input type="text" name="lastName">


        <label for="passport Picture">Passport Picture</label>
        <input type="file" name="passport">

        <p style="color: red; text-align:right">توجه: در صورت تغییر اسم و فامیل لطفا نام قبلی را درج فرمایید</p>
        <textarea name="changeName" id="changeName" cols="30" rows="10" placeholder="در این کادر نام قبلی خود را به همراهتوضیحات مربوط به این تغییر نام درج فرمایید." style="text-align: right;"></textarea>
        <div style="margin-top: 10px;">
            <button id="next">بعدی</button>
        </div>

        </div>

        <!-- <button type="submit">Submit</button> -->
    </form>

<?php endif; ?>