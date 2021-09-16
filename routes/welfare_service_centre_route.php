<?php

use Illuminate\Support\Facades\Route;

// Welfare Company route
Route::group(['prefix' => 'welfare-centre/', 'namespace' => 'WelfareCentre', 'as' => 'WelfareCentre.', 'middleware' => ['auth', 'welfare-centre']], function () {

    Route::get('/dashboard', 'WelfareDashboardController@dashboard')->name('dashboard');
    Route::post('/company-prfile-submit', 'WelfareDashboardController@companyPrfileSubmit')->name('companyPrfileSubmit');

    //Job Approval
    Route::get('/new-job-posts', 'JobApprovalController@NewJobPost')->name('NewJobPost');
    Route::get('/new-job-posts-show/{id}', 'JobApprovalController@NewJobPostShow')->name('NewJobPostShow');
    Route::get('/edit-job-posts/{id}', 'JobApprovalController@EditJobPost')->name('EditJobPost');
    Route::post('/job-post-update', 'JobApprovalController@postUpdate')->name('postUpdate');
    Route::get('/job-approved', 'JobApprovalController@jobApproved')->name('jobApproved');

    //Travel Candidates
    Route::get('/travel_received_list', 'TravelCandidatesController@readyToTravel')->name('travelCandidate.readyToTravel');
    Route::get('/show-received-candidate/{offered_candidate_id}', 'TravelCandidatesController@showReceivedCandidate')->name('travelCandidate.showReceivedCandidate');

    //candidate
    Route::get('/show-candidate-profile/{offered_candidate_id}', 'CandidateController@showCandidateProfile')->name('showCandidateProfile');
    //WSC registered
    Route::get('/meet-greet-request', 'MeetAndGreetController@meet_greet_request')->name('meetGreet.request');
    Route::get('/meet-greet-status/{id}', 'MeetAndGreetController@meetGreetStatus')->name('meetGreet.status');
    Route::post('/meet-greet-status-update/{id}', 'MeetAndGreetController@meetGreetStatusUpdete')->name('meetGreet.statusUpdete');
    // Jail deportation
    Route::get('/jail-deportation-request', 'JailDeportationController@request')->name('jailDeportation.request');
    Route::get('/jail-deportation-status/{id}', 'JailDeportationController@jailDeportationStatus')->name('jailDeportation.status');
    Route::post('/jail-deportation-status-update/{id}', 'JailDeportationController@jailDeportationStatusUpdete')->name('jailDeportation.statusUpdete');
    // deadbody transfer
    Route::get('/deadbody-transfer-request', 'DeadbodyTransferController@request')->name('deadbodyTransfer.request');
    Route::get('/deadbody-transfer-status/{id}', 'DeadbodyTransferController@deadbodyTransferStatus')->name('deadbodyTransfer.Status');
    Route::post('/deadbody-transfer-status-update/{id}', 'DeadbodyTransferController@deadbodyTransferStatusUpdete')->name('deadbodyTransfer.StatusUpdete');
    // medical compensation
    Route::get('/medical-compensation-request', 'MedicalCompensationController@request')->name('medicalCompensation.request');
    Route::get('/medical-compensation-status/{id}', 'MedicalCompensationController@medicalCompensationStatus')->name('medicalCompensation.Status');
    Route::post('/medical-compensation-status-update/{id}', 'MedicalCompensationController@medicalCompensationStatusUpdete')->name('medicalCompensation.StatusUpdete');
    // insurance compensation
    Route::get('/insurance-request', 'InsuranceController@request')->name('insurance.request');
    Route::get('/insurance-status/{id}', 'InsuranceController@insuranceStatus')->name('insurance.Status');
    Route::post('/insurance-status-update/{id}', 'InsuranceController@insuranceStatusUpdete')->name('insurance.StatusUpdete');

    // issuance certificate
    Route::group(['prefix' => '/issuance-certificate', 'as' => 'issuanceCertificate.'], function () {
        Route::get('requests', 'IssuanceCertificateController@requests')->name('requests');
        Route::get('status/{id}', 'IssuanceCertificateController@status')->name('status');
        Route::get('upload/{id}', 'IssuanceCertificateController@upload')->name('upload');
        Route::post('update/{id}', 'IssuanceCertificateController@update')->name('update');
        Route::post('details-update/{id}', 'IssuanceCertificateController@detailsUpdate')->name('detailsUpdate');
        Route::post('status-update/{id}', 'IssuanceCertificateController@statusUpdete')->name('statusUpdete');
        Route::get('payment', 'IssuanceCertificateController@payment')->name('payment');
        Route::get('receipt/{id}', 'IssuanceCertificateController@viewReceipt')->name('receipt');
        Route::get('paids', 'IssuanceCertificateController@paids')->name('paids');
        Route::get('delivered', 'IssuanceCertificateController@delivered')->name('delivered');
    });
    // attestation-certificate
    Route::group(['prefix' => '/attestation-certificate', 'as' => 'attestationCertificate.'], function () {
        Route::get('requests', 'AttestationCertificateController@requests')->name('requests');
        Route::get('upload/{id}', 'AttestationCertificateController@upload')->name('upload');
        Route::post('update/{id}', 'AttestationCertificateController@update')->name('update');
        Route::get('payment', 'AttestationCertificateController@payment')->name('payment');
        Route::get('receipt/{id}', 'AttestationCertificateController@viewReceipt')->name('receipt');
        Route::post('status-update/{id}', 'AttestationCertificateController@statusUpdete')->name('statusUpdete');
        Route::get('paids', 'AttestationCertificateController@paids')->name('paids');
        Route::get('status/{id}', 'AttestationCertificateController@status')->name('status');
        Route::post('details-update/{id}', 'AttestationCertificateController@detailsUpdate')->name('detailsUpdate');
        Route::get('delivered', 'AttestationCertificateController@delivered')->name('delivered');
    });

    // registration certificates
    Route::group(['prefix' => '/registration-certificate', 'as' => 'registrationCertificate.'], function () {
        Route::get('request', 'RegistrationCertificateController@requests')->name('requests');
        Route::get('upload/{id}', 'RegistrationCertificateController@upload')->name('upload');
        Route::post('update/{id}', 'RegistrationCertificateController@update')->name('update');
        Route::get('payment', 'RegistrationCertificateController@payment')->name('payment');
        Route::get('receipt/{id}', 'RegistrationCertificateController@viewReceipt')->name('receipt');
        Route::post('status-update/{id}', 'RegistrationCertificateController@statusUpdete')->name('statusUpdete');
        Route::get('paids', 'RegistrationCertificateController@paids')->name('paids');
        Route::get('status/{id}', 'RegistrationCertificateController@status')->name('status');
        Route::post('details-update/{id}', 'RegistrationCertificateController@detailsUpdate')->name('detailsUpdate');
        Route::get('delivered', 'RegistrationCertificateController@delivered')->name('delivered');
    });
    // charity service
    Route::get('/charity-request', 'CharityServiceController@request')->name('charity.request');
    Route::get('/charity-request-status/{id}', 'CharityServiceController@charityStatus')->name('charity.status');
    Route::post('/charity-request-status-update/{id}', 'CharityServiceController@charityStatusUpdete')->name('charity.statusUpdete');

    // adr service
    Route::get('/adr-request', 'ADRServiceController@request')->name('adr.request');
    Route::get('/adr-request-status/{id}', 'ADRServiceController@adrStatus')->name('adr.status');
    Route::post('/adr-request-status-update/{id}', 'ADRServiceController@adrStatusUpdete')->name('adr.statusUpdete');
    // legal-by-govt
    Route::group(['prefix' => '/legal-by-govt', 'as' => 'legalByGovt.'], function () {
        Route::get('requests', 'AmnestyServiceController@requests')->name('requests');
        Route::get('upload/{id}', 'AmnestyServiceController@upload')->name('upload');
        Route::post('update/{id}', 'AmnestyServiceController@update')->name('update');
        Route::get('payments', 'AmnestyServiceController@payments')->name('payments');
        Route::get('receipt/{id}', 'AmnestyServiceController@viewReceipt')->name('receipt');
        Route::post('status-update/{id}', 'AmnestyServiceController@statusUpdete')->name('statusUpdete');
        Route::get('paids', 'AmnestyServiceController@paids')->name('paids');
        Route::get('status/{id}', 'AmnestyServiceController@status')->name('status');
        Route::post('details-update/{id}', 'AmnestyServiceController@detailsUpdate')->name('detailsUpdate');
        Route::get('delivery', 'AmnestyServiceController@delivery')->name('delivery');
    });
    // legal-by-regular
    Route::group(['prefix' => '/legal-by-regular', 'as' => 'legalByRegular.'], function () {
        Route::get('requests', 'PaymentServiceController@requests')->name('requests');
        Route::get('upload/{id}', 'PaymentServiceController@upload')->name('upload');
        Route::post('update/{id}', 'PaymentServiceController@update')->name('update');
        Route::get('payments', 'PaymentServiceController@payments')->name('payments');
        Route::get('receipt/{id}', 'PaymentServiceController@viewReceipt')->name('receipt');
        Route::post('status-update/{id}', 'PaymentServiceController@statusUpdete')->name('statusUpdete');
        Route::get('paids', 'PaymentServiceController@paids')->name('paids');
        Route::get('status/{id}', 'PaymentServiceController@status')->name('status');
        Route::post('details-update/{id}', 'PaymentServiceController@detailsUpdate')->name('detailsUpdate');
        Route::get('delivery', 'PaymentServiceController@delivery')->name('delivery');
    });
    // change-of-employer
    Route::group(['prefix' => '/change-of-employer', 'as' => 'changeOfEmployer.'], function () {
        Route::get('requests', 'ChangeEmployerServiceController@requests')->name('requests');
        Route::get('upload/{id}', 'ChangeEmployerServiceController@upload')->name('upload');
        Route::post('update/{id}', 'ChangeEmployerServiceController@update')->name('update');
        Route::get('payments', 'ChangeEmployerServiceController@payments')->name('payments');
        Route::get('receipt/{id}', 'ChangeEmployerServiceController@viewReceipt')->name('receipt');
        Route::post('status-update/{id}', 'ChangeEmployerServiceController@statusUpdete')->name('statusUpdete');


    });

    Route::get('/change_emp_paid', 'WSC_RegisteredController@change_emp_paid')->name('change_emp_paid');
    Route::get('/change_emp_delivery', 'WSC_RegisteredController@change_emp_delivery')->name('change_emp_delivery');

    Route::get('/change_visa_request', 'WSC_RegisteredController@change_visa_request')->name('change_visa_request');
    Route::get('/change_visa_payment', 'WSC_RegisteredController@change_visa_payment')->name('change_visa_payment');
    Route::get('/change_visa_paid', 'WSC_RegisteredController@change_visa_paid')->name('change_visa_paid');
    Route::get('/change_visa_delivery', 'WSC_RegisteredController@change_visa_delivery')->name('change_visa_delivery');

    Route::get('/legal_aid_request', 'WSC_RegisteredController@legal_aid_request')->name('legal_aid_request');

    Route::get('/new_passport_request', 'WSC_RegisteredController@new_passport_request')->name('new_passport_request');
    Route::get('/new_passport_payment', 'WSC_RegisteredController@new_passport_payment')->name('new_passport_payment');
    Route::get('/new_passport_status', 'WSC_RegisteredController@new_passport_status')->name('new_passport_status');
    Route::get('/new_passport_delivery', 'WSC_RegisteredController@new_passport_delivery')->name('new_passport_delivery');

    Route::get('/lost_passport_request', 'WSC_RegisteredController@lost_passport_request')->name('lost_passport_request');
    Route::get('/lost_passport_payment', 'WSC_RegisteredController@lost_passport_payment')->name('lost_passport_payment');
    Route::get('/lost_passport_status', 'WSC_RegisteredController@lost_passport_status')->name('lost_passport_status');
    Route::get('/lost_passport_delivery', 'WSC_RegisteredController@lost_passport_delivery')->name('lost_passport_delivery');

    Route::get('/renew_passport_request', 'WSC_RegisteredController@renew_passport_request')->name('renew_passport_request');
    Route::get('/renew_passport_payment', 'WSC_RegisteredController@renew_passport_payment')->name('renew_passport_payment');
    Route::get('/renew_passport_status', 'WSC_RegisteredController@renew_passport_status')->name('renew_passport_status');
    Route::get('/renew_passport_delivery', 'WSC_RegisteredController@renew_passport_delivery')->name('renew_passport_delivery');

    //awareness event
    Route::get('/create-awareness-event', 'AwarenessEventController@create')->name('awarenessevent.create');
    Route::post('/store-awareness-event', 'AwarenessEventController@store')->name('awarenessevent.store');
    Route::get('/show-awareness-event/{id}', 'AwarenessEventController@show')->name('awarenessevent.show');
    Route::get('/edit-awareness-event/{id}', 'AwarenessEventController@edit')->name('awarenessevent.edit');
    Route::post('/update-awareness-event/{id}', 'AwarenessEventController@update')->name('awarenessevent.update');
    Route::get('/upcoming-events', 'AwarenessEventController@upcoming_events')->name('awarenessevent.upcoming_events');
    Route::get('/total-events', 'AwarenessEventController@total_events')->name('awarenessevent.total_events');
});
