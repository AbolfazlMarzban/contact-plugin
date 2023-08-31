<!-- <?php if (get_plugin_options('contact_plugin_active')) : ?> -->

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
            <label for="First Name" style="text-align: right;">جنسیت</label>
            <div style="display: flex; align-items: end; flex-direction:column;">
                <div style="display: flex; align-items:center;">

                    <label for="مرد" style="margin-right: 10px;">مرد</label>
                    <input type="radio" name="sex" value="مرد">
                    <br>
                </div>
                <div style="display: flex; align-items:center;">
                    <label for="زن" style="margin-right: 10px;">زن</label>
                    <input type="radio" name="sex" value="زن">

                    <br>
                </div>
            </div>


            <label for="First Name" style="text-align: right; margin-top: 20px;">وضعیت تأهل</label>
            <div style="display: flex; align-items: end; flex-direction:column;">
                <div style="display: flex; align-items:center;">

                    <label for="single" style="margin-right: 10px;">مجرد (هیچ گاه ازدواج نکرده اید)</label>
                    <input type="radio" name="single" value="single">
                    <br>
                </div>
                <div style="display: flex; align-items:center;">
                    <label for="married" style="margin-right: 10px;">متأهل</label>
                    <input type="radio" name="married" value="married">

                    <br>
                </div>
                <div style="display: flex; align-items:center;">
                    <label for="notMarried" style="margin-right: 10px;">از همسر خود جدا شده اید</label>
                    <input type="radio" name="notMarried" value="notMarried">

                    <br>
                </div>
            </div>


            <label for="birthDate" style="text-align: right; margin-top:20px;">تاریخ تولد میلادی</label>
            <input type="date" name="birthDate" id="birthDate" style="text-align: end;">

            <label for="imigrationIntent" style="text-align: right; margin-top: 20px;">آیا تا به حال برای مهاجرت به آمریکا از مسیر دیگری اقدام کرده اید؟</label>
            <div style="display: flex; align-items: end; flex-direction:column;">
                <div style="display: flex; align-items:center;">

                    <label for="imigrationIntent" style="margin-right: 10px;">بله</label>
                    <input type="radio" name="imigrationIntent" value="بله">
                    <br>
                </div>
                <div style="display: flex; align-items:center;">
                    <label for="imigrationIntent" style="margin-right: 10px;">خیر</label>
                    <input type="radio" name="imigrationIntent" value="خیر">

                    <br>
                </div>
            </div>


            <div style="margin-top: 10px;">
                <button id="next">بعدی</button>
                <button id="next">قبلی</button>

            </div>

        </div>


        <div id="thirdStep" style="display: flex; flex-direction: column;">
            <div style="display: flex; align-items: end; flex-direction:column;">
                <label for="">محل تولد</label>
                <div style="display: flex; align-items:center;">

                    <label for="birthPlace" style="margin-right: 10px;">ایران</label>
                    <input type="radio" name="birthPlace" value="iran">
                    <br>
                </div>
                <div style="display: flex; align-items:center;">
                    <input type="text" name="birthPlace" style="margin-right: 10px;">
                    <label for="birthPlace" style="margin-right: 10px;">کشور دیگر</label>
                    <br>
                </div>
            </div>


            <label for="livingPlace" style="text-align: right; margin-top: 20px;">کشور محل زندگی در حال حاضر به انگلیسی</label>
            <input type="text" name="livingPlace" id="livingPlace" style="margin-top: 10px;">

            
            <label for="passport Picture" style="text-align: right; margin-top: 20px;">تصویر پاسپورت</label>
            <input type="file" name="passport">


            <label for="address" style="text-align: right; margin-top: 20px;">آدرس محل سکونت</label>
            <textarea name="address" id="address" cols="30" rows="10" placeholder="Example
No number
Street
City
Country
province"></textarea>
            <div style="margin-top: 10px;">
                <button id="next">بعدی</button>
                <button id="next">قبلی</button>

            </div>

        </div>

        </div>

        <!-- <button type="submit">Submit</button> -->
    </form>

<!-- <?php endif; ?> -->