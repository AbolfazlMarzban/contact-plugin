<?php if (get_plugin_options('contact_plugin_active')): ?>

    <div id="form_success" style="background: green; color: white;"></div>
    <div id="form_errorr" style="background: red; color: white;text-align:right;"></div>

    <div id="signupForm" style="display: flex; flex-direction:column;">
    <label for="phoneNumber" id="phoneLabel" style="text-align: right; margin-bottom: 10px;">شماره تلفن خود را وارد کنید</label>
    <input type="tel" id="phoneNumber">
    <button id="signUpBtn" type="submit" style="margin-top: 10px;">ارسال کد</button>
</div>
    <div id="codeBox" style="display: flex; flex-direction:column;">
    <label for="phoneNumber" id="phoneLabel" style="text-align: right; margin-bottom: 10px;">کد ارسال شده را وارد کنید</label>
    <input type="tel" id="sentCode">
    <button id="submitCode" type="submit" style="margin-top: 10px;">ثبت نام</button>
</div>
    <form id="advForm" class="adv-Form" style="display: flex; flex-direction: column; padding: 30px">


        <?php wp_nonce_field('wp_rest'); ?>
        <div id="firstStep" style="display: flex; flex-direction: column;">
            <label for="First Name" style="text-align: left;">First Name</label>
            <input type="text" name="firstName">


            <label for="Last Name" style="text-align: left;">Last Name</label>
            <input type="text" name="lastName">


            <label for="passport Picture" style="text-align: left;">Passport Picture</label>
            <input type="file" id="passport" name="passport"  style="direction: ltr; margin-top: 10px;" >

            <p style="color: red; text-align:right">توجه: در صورت تغییر اسم و فامیل لطفا نام قبلی را درج فرمایید</p>
            <textarea name="نام تغییر یافته" id="changeName" cols="30" rows="10"
                placeholder="در این کادر نام قبلی خود را به همراه توضیحات مربوط به این تغییر نام درج فرمایید."
                style="text-align: right;"></textarea>

            <?php if(get_plugin_options('contact_plugin_guide1')): ?>

            <label for="" style="text-align: right;margin-top:20px;">ویدیوی راهنمایی</label>
            <video style="margin-top: 20px;" src="<?php echo get_plugin_options('contact_plugin_guide1'); ?>" controls></video>
            <?php endif; ?>
            <div style="margin-top: 10px;direction:ltr;">
                <button id="firstNext">بعدی</button>
            </div>

        </div>


        <div id="secondStep" style="display: flex; flex-direction: column;">
            <label for="First Name" style="text-align: right;">جنسیت</label>
            <div style="display: flex; flex-direction:column;">
                <div style="display: flex; align-items:center;">
                <input type="radio" name="جنسیت" value="مرد">
                    <label for="مرد" style="margin-right: 10px;">مرد</label>
                    <br>
                </div>
                <div style="display: flex; align-items:center;">
                    <input type="radio" name="جنسیت" value="زن">
                    <label for="زن" style="margin-right: 10px;">زن</label>

                    <br>
                </div>
            </div>

            <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 20px;">
            <label for="First Name" style="text-align: right;" >وضعیت تأهل</label>
            <button id="support_marriageStat">درخواست پشتیبانی تلفنی</button>
            </div>
            <div style="display: flex; flex-direction:column;">
                <div style="display: flex; align-items:center;">

                <input type="radio" name="وضعیت تأهل" value="single">
                    <label for="single" style="margin-right: 10px;">مجرد (هیچ گاه ازدواج نکرده اید)</label>
                    <br>
                </div>
                <div style="display: flex; align-items:center;">
                    <input type="radio" name="وضعیت تأهل"" value="married">
                    <label for="married" style="margin-right: 10px;">متأهل</label>

                    <br>
                </div>
                <div style="display: flex; align-items:center;">
                    <input type="radio" name="وضعیت تأهل" value="divorced">
                    <label for="notMarried" style="margin-right: 10px;">از همسر خود جدا شده اید</label>

                    <br>
                </div>
            </div>


            <label for="birthDate" style="text-align: right; margin-top:20px;">تاریخ تولد میلادی</label>
            <input type="date" name="تاریخ تولد" id="birthDate" style="text-align: end; margin-top:10px;">


            <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 20px;">
            <label for="imigrationIntent" style="text-align: right;">آیا تا به حال برای مهاجرت به آمریکا
                از مسیر دیگری اقدام کرده اید؟</label>
                <button id="support_immigrationIntent">درخواست پشتیبانی تلفنی</button>

            </div>
         

            <div style="display: flex; flex-direction:column;">
                <div style="display: flex; align-items:center;">

                <input type="radio" name="اقدام مهاجرت" value="بله">
                    <label for="imigrationIntent" style="margin-right: 10px;">بله</label>
                    <br>
                </div>
                <div style="display: flex; align-items:center;">
                    <input type="radio" name="اقدام مهاجرت" value="خیر">
                    <label for="imigrationIntent" style="margin-right: 10px;">خیر</label>

                    <br>
                </div>
            </div>

            <?php if(get_plugin_options('contact_plugin_guide2')): ?>

            <label for="" style="text-align: right;margin-top:20px;">ویدیوی راهنمایی</label>
            <video style="margin-top: 20px;" src="<?php echo get_plugin_options('contact_plugin_guide2'); ?>" controls></video>
            
            <?php endif; ?>

            <div style="margin-top: 10px; direction:ltr;">
                <button id="secondNext">بعدی</button>
                <button id="secondPrev">قبلی</button>

            </div>

        </div>


        <div id="thirdStep" style="display: flex; flex-direction: column;">
            <div style="display: flex; flex-direction:column;">
                <label for="">محل تولد</label>
                <div style="display: flex; align-items:center;">

                <input type="radio" name="محل تولد" value="iran">
                    <label for="محل تولد" style="margin-right: 10px;">ایران</label>
                    <br>
                </div>
                <div style="display: flex; align-items:center;">
                    <label for="محل تولد" style="margin-right: 10px;">کشور دیگر</label>
                    <input type="text" name="محل تولد" style="margin-right: 10px; width:inherit;">
                    <br>
                </div>
            </div>


            <label for="livingPlace" style="text-align: right; margin-top: 20px;">کشور محل زندگی در حال حاضر به
                انگلیسی</label>
            <input type="text" name="محل زندگی در حال حاضر" id="livingPlace" style="margin-top: 10px;">


            <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 20px;">
            <label for="address" style="text-align: right;">آدرس محل سکونت</label>
            <button id="support_address">درخواست پشتیبانی تلفنی</button>
            </div>


            <textarea name="آدرس" id="address" cols="30" rows="10" style="margin-top: 10px;" placeholder="
                    Example
                    No number
                    Street
                    City
                    Country
                    province"></textarea>


            <label for="phone" style="text-align:right; margin-top: 20px;">شماره تماس</label>
            <input type="tel" name="شماره تماس" id="phone" style="margin-top:10px;">
            <input type="tel" name="شماره تماس" id="phone" style="margin-top:10px;">


            <?php if(get_plugin_options('contact_plugin_guide3')): ?>

            <label for="" style="text-align: right;margin-top:20px;">ویدیوی راهنمایی</label>
            <video style="margin-top: 20px;" src="<?php echo get_plugin_options('contact_plugin_guide3'); ?>" controls></video>
            <?php endif; ?>

            <div style="margin-top: 10px; direction:ltr;">
                <button id="thirdNext">بعدی</button>
                <button id="thirdPrev">قبلی</button>

            </div>

        </div>



       

        <div id="fourthStep" style="display: flex; flex-direction: column;">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 20px;">
            <label for="employmentRecords" style="text-align:right">اطلاعات سابقه کاری</label>
            <button id="support_employmentRec">درخواست پشتیبانی تلفنی</button>
            </div>


            <textarea name="اطلاعات سابقه کاری" id="employmentRecords" cols="30" rows="10"
                style="text-align: right; margin-top: 10px;" placeholder="
                            نام محل خدمت:
                            نام سوپروایزر:
                            کشور محل خدمت:
                            ادرس محل خدمت:
                            تایم کاری ( نیمه وقت و یا تمام وقت)
                            "></textarea>

            <label for="daneshNameh" style="text-align:right; margin-top: 10px">تصویر با کیفیت دانشنامه (اصل و
                ترجمه)</label>
            <input type="file" name="daneshNameh" id="daneshNameh" style="direction: ltr; margin-top: 10px;">


            <label for="rizNomarat" style="text-align:right; margin-top: 10px">تصویر با کیفیت از تمام صفحات ریزنمرات (اصل و
                ترجمه)</label>
            <input type="file" name="rizNomarat" id="rizNomarat"  style="direction: ltr; margin-top: 10px;">

            <?php if(get_plugin_options('contact_plugin_guide4')): ?>

            
            <label for="" style="text-align: right;margin-top:20px;">ویدیوی راهنمایی</label>
            <video style="margin-top: 20px;" src="<?php echo get_plugin_options('contact_plugin_guide4'); ?>" controls></video>

            <?php endif; ?>


            <div style="margin-top: 10px; direction:ltr;">
                <button id="fourthNext">بعدی</button>
                <button id="fourthPrev">قبلی</button>

            </div>
        </div>
        <div id="fifthStep" style="display: flex; flex-direction: column;">

        <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 20px;">
            <label style="text-align:right">اطلاعات تحصیلی لیسانس</label>
            <button id="support_bachelorInfo">درخواست پشتیبانی تلفنی</button>
            </div>


            <label for="bachelorplace" style="text-align:right; margin-top: 10px">کشور محل تحصیل لیسانس</label>
            <input type="text" name="محل تحصیل لیسانس" id="bachelorplace" style="margin-top: 10px;">

            <label for="bacheloraddress" style="text-align:right; margin-top: 10px">آدرس محل دانشگاه</label>
            <textarea name="محل دانشگاه لیسانس" id="bacheloraddress" cols="30" rows="10" style="margin-top: 10px;"></textarea>

            <label for="bachelorstart" style="text-align:right; margin-top: 10px">تاریخ شروع تحصیل به میلادی</label>
            <input type="date" name="تاریخ شروع لیسانس" id="bachelorstart" style="text-align:right;margin-top:10px;">

            <label for="bachelorend" style="text-align:right; margin-top: 10px">تاریخ فارغ التحصیلی به میلادی</label>
            <input type="date" name="تاریخ پایان لیسانس" id="bachelorend" style="text-align:right;margin-top:10px;">

            <?php if(get_plugin_options('contact_plugin_guide5')): ?>

            <label for="" style="text-align: right;margin-top:20px;">ویدیوی راهنمایی</label>
            <video style="margin-top: 20px;" src="<?php echo get_plugin_options('contact_plugin_guide5'); ?>" controls></video>
            <?php endif; ?>
            <div style="margin-top: 10px; direction: ltr;">
                <button id="fifthNext">بعدی</button>
                <button id="fifthPrev">قبلی</button>

            </div>

        </div>
        <div id="sixthStep" style="display: flex; flex-direction: column;">
            <div style="display: flex; flex-direction:column;">
                <div style="display: flex; align-items:center;">

                <input type="radio" name="مدرک پیش دانشگاهی" value="havePreUni">
                    <label for="havePreUni" style="margin-right: 10px;">دارای مدرک پیش دانشگاهی هستم</label>
                    <br>
                </div>
                <div style="display: flex; align-items:center;">
                    <input type="radio" name="مدرک پیش دانشگاهی" value="nothavePreUni">
                    <label for="nothavePreUni" style="margin-right: 10px;">مدرک پیش دانشگاهی ندارم</label>
                    <br>
                </div>
            </div>


            <label for="" style="margin-top: 10px; text-align: right;">اطلاعات دبیرستان</label>


            <label for="schoolCountry" style="text-align:right; margin-top: 10px;">کشور محل تحصیل</label>
            <input type="text" name="محل تصیل دبیرستان" id="schoolCountry" style="margin-top: 10px;">

            <label for="schoolName" style="text-align:right; margin-top: 10px;">نام مدرسه</label>
            <input type="text" name="نام مدرسه دبیرستان" id="schoolName" style="margin-top: 10px;">


            <label for="eduName" style="text-align:right; margin-top: 10px;">نام شما در زمان تحصیل</label>
            <input type="text" name="نام در زمان تحصیل" id="eduName" placeholder=" در صورت تغییر نام پر شود" style="margin-top: 10px;">

            <label for="highScstart" style="text-align:right; margin-top: 10px">تاریخ شروع تحصیل به میلادی</label>
            <input type="date" name="تاریخ شروع دبیرستان" id="highScstart" style="text-align:right; margin-top: 10px;"> 

            <label for="highScend" style="text-align:right; margin-top: 10px">تاریخ فارغ التحصیلی به میلادی</label>
            <input type="date" name="تاریخ پایان دبیرستان" id="highScend" style="text-align:right; margin-top: 10px;">


            <?php if(get_plugin_options('contact_plugin_guide6')): ?>

            <label for="" style="text-align: right;margin-top:20px;">ویدیوی راهنمایی</label>
            <video style="margin-top: 20px;" src="<?php echo get_plugin_options('contact_plugin_guide6'); ?>" controls></video>

            <?php endif; ?>
            <div style="margin-top: 10px; direction:ltr;">
                <button id="sixthNext">بعدی</button>
                <button id="sixthPrev">قبلی</button>

            </div>

        </div>

        <div id="seventhStep" style="display: flex; flex-direction: column;">

            <label for="" style="margin-top: 10px; text-align: right;">اطلاعات پیش دانشگاهی</label>


            <label for="preUniCountry" style="text-align:right; margin-top: 10px;">کشور محل تحصیل</label>
            <input type="text" name="کشور محل تحصیل پیش دانشگاهی" id="preUniCountry" style="margin-top: 10px;">

            <label for="preUniName" style="text-align:right; margin-top: 10px;">نام مدرسه</label>
            <input type="text" name="نام مدرسه پیش دانشگاهی" id="preUniName" style="margin-top: 10px;">


            <label for="preUniName" style="text-align:right; margin-top: 10px;">نام شما در زمان تحصیل</label>
            <input type="text" name="نام در زمان تحصیل پیش دانشگاهی" id="preUniName" placeholder=" در صورت تغییر نام پر شود" style="margin-top: 10px;">

            <label for="preUniStart" style="text-align:right; margin-top: 10px">تاریخ شروع تحصیل به میلادی</label>
            <input type="date" name="تاریخ شروع پیش دانشگاهی" id="preUniStart" style="text-align:right; margin-top:10px" >

            <label for="preUniEnd" style="text-align:right; margin-top: 10px">تاریخ فارغ التحصیلی به میلادی</label>
            <input type="date" name="تاریخ پایان پیش دانشگاهی" id="preUniEnd" style="text-align:right; margin-top:10px;">


            <?php if(get_plugin_options('contact_plugin_guide7')): ?>

            <label for="" style="text-align: right;margin-top:20px;">ویدیوی راهنمایی</label>
            <video style="margin-top: 20px;" src="<?php echo get_plugin_options('contact_plugin_guide7'); ?>" controls></video>

                <?php endif; ?>
            <div style="margin-top: 10px; direction: ltr;">
                <button id="seventhNext">بعدی</button>
                <button id="seventhPrev">قبلی</button>

            </div>

        </div>

        <div id="eighthStep" style="display: flex; flex-direction: column;">

            <label for="" style="margin-top: 10px; text-align: right;">اطلاعات مقطع راهنمایی</label>


            <label for="middleScCountry" style="text-align:right; margin-top: 10px;">کشور محل تحصیل</label>
            <input type="text" name="محل تحصیل راهنمایی" id="middleScCountry" style="margin-top: 10px;">

            <label for="middleScSchoolName" style="text-align:right; margin-top: 10px;">نام مدرسه</label>
            <input type="text" name="نام مدرسه راهنمایی" id="middleScSchoolName" style="margin-top: 10px;">


            <label for="middleScName" style="text-align:right; margin-top: 10px;">نام شما در زمان تحصیل</label>
            <input type="text" name="نام در زمان تحصیل راهنمایی" id="middleScName" placeholder=" در صورت تغییر نام پر شود" style="margin-top: 10px;">

            <label for="middleScStart" style="text-align:right; margin-top: 10px">تاریخ شروع تحصیل به میلادی</label>
            <input type="date" name="تاریخ شروع مقطع راهنمایی" id="middleScStart" style="text-align:right; margin-top:10px;">

            <label for="middleScEnd" style="text-align:right; margin-top: 10px">تاریخ فارغ التحصیلی به میلادی</label>
            <input type="date" name="تاریخ پایان مقطع راهنمایی" id="middleScEnd" style="text-align:right; margin-top:10px;">


            <?php if(get_plugin_options('contact_plugin_guide8')): ?>

            <label for="" style="text-align: right;margin-top:20px;">ویدیوی راهنمایی</label>
            <video style="margin-top: 20px;" src="<?php echo get_plugin_options('contact_plugin_guide8'); ?>" controls></video>

            <?php endif; ?>
            <div style="margin-top: 10px; direction:ltr;">
                <button id="eighthNext">بعدی</button>
                <button id="eighthPrev">قبلی</button>

            </div>

        </div>

        <div id="ninethStep" style="display: flex; flex-direction: column;">
        <label for="" style="text-align:right;">آیا مدرک زبان دارید؟</label>
        <div style="display: flex; flex-direction:column;">
                <div style="display: flex; align-items:center;">

                <input type="radio" name="دارای مدرک زبان" value="yes">
                    <label for="haveLang" style="margin-right: 10px;">بله</label>
                    <br>
                </div>
                <div style="display: flex; align-items:center;">
                    <input type="radio" name="دارای مدرک زبان" value="no">
                    <label for="nothaveLang" style="margin-right: 10px;">خیر</label>
                    <br>
                </div>
            </div>
            <p style="text-align:right; margin-top: 10px;">اگر بله?</p>


            <label for="langDeg" style="text-align:right;">نوع مدرک</label>
            <input type="text" name="نوع مدرک زبان" id="langDeg" style="margin-top: 10px;">


            <label for="langScore" style="text-align:right; margin-top: 10px;">نمره</label>
            <input type="text" name="نمره مدرک زبان" id="langScore" style="margin-top: 10px;">
            
            <?php if(get_plugin_options('contact_plugin_guide9')): ?>

            <label for="" style="text-align: right;margin-top:20px;">ویدیوی راهنمایی</label>
            <video style="margin-top: 20px;" src="<?php echo get_plugin_options('contact_plugin_guide9'); ?>" controls></video>
            <?php endif; ?>
            <div style="margin-top: 10px; direction:ltr;">
            <button type="submit" style="margin-top: 20px;">ارسال اطلاعات</button>
                <button id="ninethPrev">قبلی</button>

            </div>

        </div>

    </form>

    <?php endif; ?>