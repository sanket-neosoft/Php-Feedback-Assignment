<?php
if (empty($_SESSION["status"]) && empty($_SESSION["employee_name"])) {
    header("location: ?p=feedback");
    exit();
}

if (empty($_SESSION["overall_rating"]) && empty($_SESSION["employee_status"] && $_SESSION["job_title"]) && empty($_SESSION["review_headline"] && $_SESSION["pros"]) && empty($_SESSION["cons"] && $_SESSION["advice_management"])) {
    header("location: ?p=step2");
    exit();
}

if (isset($_POST["pre"])) {
    header("location: ?p=step2");
    exit();
}

if (isset($_POST["sub"])) {
    $proofErr = $tacErr = "";

    $_SESSION["proof_tmp"] = $_FILES["proof"]["tmp_name"];
    $_SESSION["proof_name"] = $_FILES["proof"]["name"];
    $_SESSION["proof_size"] = $_FILES["proof"]["size"];
    echo $_SESSION["proof_size"];

    $tac = $_POST["tac"];

    if (empty($_SESSION["proof_name"])) {
        $proofErr = "Please select pdf or doc file.";
    }

    if (!empty($tac)) {
        $_SESSION["ext"] = pathinfo($_SESSION["proof_name"], PATHINFO_EXTENSION);
        if ($_SESSION["ext"] === "doc" || $_SESSION["ext"] === "pdf") {
            if ($_SESSION["proof_size"] > 10000000) {
                $proofErr = "Maximum File size should be 10Mb";
            } else {
                $_SESSION["file_path"] = "attach-" . rand() . "-" . time() . "." . $_SESSION["ext"];
                if (move_uploaded_file($_SESSION["proof_tmp"], "uploads/" . $_SESSION["file_path"])) {
                    header("location: ?p=review");
                } else {
                    $proofErr = "File Upload falied.";
                }
            }
        } else {
            $proofErr = "File format can only be pdf or doc.";
        }
    } else {
        $tacErr = "You need to agree with terms and conditions.";
    }
}
?>

<div class="container my-5 pt-5">
    <form action="" method="POST" class="form-si p-4 bg-white border rounded shadow" enctype="multipart/form-data">
        <h3 class="text-muted mb-4">Step 3:</h3>
        <div class="form-group">
            <label for="name">Submit Proof</label>
            <input type="file" class="form-control" id="proof" name="proof" value="<?php echo $_SESSION["proof_name"]; ?>">
            <small id="employee_status" class="form-text text-danger"><?php echo $proofErr; ?></small>
        </div>
        <div class="form-group">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="agree" name="tac" value="checked" <?php
                                                                                                        if (!empty($tac)) {
                                                                                                            echo "checked";
                                                                                                        }
                                                                                                        ?>>
                <label class="form-check-label" for="agree">Agree Terms and Conditions <a href="" data-toggle="modal" data-target="#exampleModalLong"><i class="bi bi-box-arrow-up-right"></i></a> </label>
            </div>
            <small id="employee_status" class="form-text text-danger"><?php echo $tacErr; ?></small>
        </div>
        <div class="row">
            <div class="col-sm mb-2">
                <button type="submit" class="btn btn-dark btn-block" name="pre">Previous</button>
            </div>
            <div class="col-sm mb-2">
                <button type="submit" class="btn btn-warning btn-block" name="sub">Upload File</button>
            </div>
        </div>
    </form>

</div>
<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Terms and Conditions</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>These terms of service (“Terms of Service”) govern your use of John Wiley &amp; Sons, Inc. and its subsidiaries’ (“Wiley”) websites, services and applications (the “Services”). By using or accessing the Services, you agree to be bound by these Terms of Service, as updated from time to time in accordance with Section 12 below. There may be instances when we offer additional terms specific to a product, application or service. To the extent such additional terms conflict with these Terms of Service, the additional terms associated with the product, application or service, with respect to your use of the product, application or service, will prevail. References to “us,” “we,” and “our” mean John Wiley &amp; Sons, Inc.</p>
                <p><strong>1. USING THE SERVICES</strong></p>
                <p>Some Services may allow you to:</p>
                <ul>
                    <li>Add your own original content or post your content in blog or user comment areas (“Your Content”). Remember that all information that is disclosed in blog, comment or other public areas becomes public information and you should exercise caution when deciding to share any of your personal information as part of Your Content</li>
                    <li>Use the Services as modified with Your Content</li>
                    <li>Arrange for third parties to have access to Your Content subject to these Terms of Service</li>
                </ul>
                <p>By submitting Your Content to the Services, you hereby grant Wiley a worldwide, royalty-free, non-exclusive, sublicenseable and transferable license to use, distribute, reproduce, prepare derivative works of, perform and display Your Content in connection with the Services and Wiley’s business, including without limitation for promoting the Services, in all media now known or hereafter devised through any media channels. You acknowledge that use of the Services is for your personal use only.</p>
                <p>Except as expressly permitted herein, you shall not:</p>
                <ul>
                    <li>Access the Services by any means other than instructions provided by Wiley</li>
                    <li>Use the Services for any illegal or unauthorized purpose</li>
                    <li>Share with any third party any access codes or account information, including without limitation your username and password that you may create or Wiley may provide in connection with the Services</li>
                </ul>
                <p>And/Or upload, post or otherwise distribute or facilitate distribution of any content that:</p>
                <ul>
                    <li>Is unlawful, threatening, abusive, harassing, defamatory, deceptive, fraudulent, invasive of another’s privacy, discriminatory, sexually oriented or tortious;</li>
                    <li>Infringes on any patent, trademark, trade secret, copyright, right of publicity, or other proprietary right of any party;</li>
                    <li>Constitutes unauthorized or unsolicited advertising, junk or bulk e-mail, or any form of lottery or gambling;</li>
                    <li>Constitutes the selling or trading of any merchandise;</li>
                    <li>Constitutes the soliciting for advertisers/sponsors; conducting contests/raffles; displaying advertising/sponsorship art; promoting, soliciting or participating in chain letters or marketing/pyramid schemes;</li>
                    <li>Contains software viruses or any other computer code, files, or programs that are designed or intended to disrupt, damage, or limit the functioning of any software, hardware, or telecommunications equipment or to damage or obtain unauthorized access to any data or other information of any third party;</li>
                    <li>Contains links to sites that violate these Terms of Service, such as pornographic sites, defamatory sites, and so on; or</li>
                    <li>Impersonates any person or entity.</li>
                </ul>
                <p>We generally do not pre-screen, monitor or edit the content posted by users of the Services. However, we have the right at our sole discretion to remove any content that, in our judgment, does not comply with the foregoing or is otherwise harmful, objectionable, or inaccurate. We are not responsible for any failure or delay in removing such content.</p>
                <p>You are responsible for all activity that occurs under your account and you are solely responsible for maintaining the confidentiality of your access codes and account information. You must notify us immediately if you become aware of any unauthorized use of your access codes or account information.</p>
                <p><strong><span style="color: #000000;">2. OWNERSHIP</span></strong></p>
                <p>All rights (including without limitation, copyrights, trademarks, patents and trade secrets) in the Services and the content contained therein, other than Your Content, (“Wiley Content”) are and will remain the sole and exclusive property of Wiley and/or its licensors. No title to or ownership of any portion of the Services, the Wiley Content or any other products or services manufactured, sold and/or distributed or otherwise made available by Wiley, or any proprietary rights related to those products/services, is or will be transferred pursuant to or by virtue of this agreement. Wiley hereby grants you a limited, non-exclusive, nonsublicensable, revocable license to display and reproduce the Wiley Content (other than software code) solely for your personal use in connection with using the Services in accordance with these Terms of Service.</p>
                <p><strong><span style="color: #000000;">3. FEEDBACK</span></strong></p>
                <p>You may from time to time provide Wiley with suggestions, ideas or other feedback regarding the Services (“Feedback”). Both parties agree that Wiley shall own such Feedback and is entitled, but not obligated, to use, develop and exploit it in any manner, without restriction or duty to compensate or seek permission from you.</p>
                <p><strong><span style="color: #000000;">4. TERM AND TERMINATION</span></strong></p>
                <p>We reserve the right, in our sole discretion, to terminate your access to all or part of the Services, with or without notice.</p>
                <p>Upon termination, all rights granted to you in these Terms of Service will immediately cease.</p>
                <p>To the extent that you have a subscription that extends beyond termination of these Terms of Service, unless such termination is due to your breach, the subscription shall remain in force for the period set forth in the subscription’s terms or subscription order.</p>
                <p>Any provision of these Terms of Service that expressly or by implication is intended to continue in force after termination or expiration of these Terms of Service will survive.</p>
                <p><strong><span style="color: #000000;">5. INDEMNIFICATION</span></strong></p>
                <p>A) To the extent permitted by applicable law, you will defend, indemnify and hold harmless Wiley, its licensees, and their respective affiliates, parents and subsidiaries and their respective officers, directors, agents, representatives, successors and assigns (the “Wiley Indemnitees”) from and against all liability and expense, including without limitation reasonable counsel fees and costs, arising from any claim, suit or proceeding brought against a Wiley Indemnitee (i) claiming that Your Content infringes or misappropriates any patent, copyright, trademark, trade secret or other proprietary right of any third party or (ii) in connection with your violation of these Terms of Service.</p>
                <p>B) In the event of a claim triggering your obligation to indemnify, you shall provide us with (i) prompt written notice of any such claim; (ii) control over the defense and settlement of such claim and (iii) proper and full information and assistance to settle or defend any such claim.</p>
                <p><strong><span style="color: #000000;">6. DISCLAIMER</span></strong></p>
                <p>The services are provided &#8220;as is&#8221;, without warranty of any kind, express or implied, including but not limited to the implied warranties of merchantability, reliability, availability or fitness for a particular purpose. the entire risk as to the results or performance of the services as assumed by you. in no event will Wiley or its licensors be liable to you for any damages, including without limitation lost profits, lost savings, or other incidental or consequential damages arising out of the use of inability to use the services, even if Wiley has been advised of the possibility of such damages. the terms of this sections 6 shall apply to the fullest extent permitted by the law in the applicable jurisdiction.</p>
                <p><strong><span style="color: #000000;">7. CORRECTIONS</span></strong></p>
                <p>The Services may contain errors or inaccuracies and may not be complete or current. Wiley, therefore, reserves the right to correct any errors, inaccuracies or omissions (including after an order has been submitted) and to change or update information at any time without prior notice. Please note that such errors, inaccuracies, or omissions may relate to pricing, and we reserve the right to cancel or refuse to accept any order placed based on incorrect pricing or availability information.</p>
                <p><strong><span style="color: #000000;">8. INJUNCTIVE RELIEF</span></strong></p>
                <p>You agree that any breach of your obligations with respect to Wiley&#8217;s proprietary or intellectual property rights will result in irreparable injury to Wiley for which money damages are inadequate, and you therefore agree that Wiley shall be entitled to seek injunctive relief, without the requirement of posting a bond, in addition to any other relief that a court may deem proper.</p>
                <p><strong>9. FERPA (</strong><strong>US</strong><strong> only)</strong></p>
                <p>Please see Wiley’s policy regarding FERPA <a href="https://www.wiley.com/ferpa">here</a>.</p>
                <p><strong>10. PROCEDURE FOR MAKING CLAIMS OF COPYRIGHT INFRINGEMENT</strong></p>
                <p>If you believe that your work has been copied and is accessible in a way that constitutes copyright infringement, you may notify EVP &amp; General Counsel, John Wiley &amp; Sons, Inc., 111 River Street, Hoboken, NJ 07030, by providing the following information:</p>
                <ul>
                    <li>The signature of the owner of the copyright or the person authorized to act on the owner’s behalf.</li>
                    <li>A description of the copyrighted work that you claim has been infringed and a description of the infringing activity.</li>
                    <li>Identification of the specific location on this website where the material that you claim is infringing is located.</li>
                    <li>Your name, address, telephone number, and email address.</li>
                    <li>A statement by you that you have a good faith belief that the disputed use is not authorized by the copyright owner, its agent, or the law.</li>
                    <li>A statement by you, made under penalty of perjury, that the above information in your notice is accurate and that you are the copyright owner or are authorized to act on the copyright owner’s behalf.</li>
                </ul>
                <p><strong>11. PRIVACY POLICY &amp; CONSENTS</strong></p>
                <p>Wiley’s Privacy Policy is located <a href="https://www.wiley.com/privacy">here</a>. Wiley will process and store profile information that you provide to Wiley (name and email) in accordance with this policy. Wiley may also send you service announcements, administrative messages and other information in connection with your use of the Services. You may opt out of particular communications.</p>
                <p>Where access to the Services has or will be provided to you through your institution or school’s (“Institution’s”) online learning management system using a ‘single sign on’ (SSO), then in accessing this Services you consent to Wiley:</p>
                <ul>
                    <li>Collecting the following personal information about you from the Institution: first and last name, institution, course name</li>
                    <li>Disclosing personal information to your Institution directly relevant to your use of the Services, such as results of assessments set by instructors and other analytics regarding your access to the Services.</li>
                </ul>
                <p><strong>12. MISCELLANEOUS</strong></p>
                <p>We make no representation that the Services are appropriate or available for use in your location, and accessing them from locations where their contents are illegal is prohibited. If you choose to access this site from any such locations, you do so on your own initiative and are responsible for compliance with local laws. These Terms of Service represent the entire agreement between us and supersedes any proposals or prior agreements, oral or written, and any other communication between us relating to the subject matter of these Terms of Service. We reserve the right, at our discretion, to update or revise these Terms of Service. Please check the Terms of Service periodically for changes. Your continued use of the Services following the posting of any changes to the Terms of Service constitutes acceptance of those changes. Please note that by using the Services, you agree that you are entering into a legally binding agreement (even if you are using the Services on behalf of a company). You acknowledge that you have read these Terms of Service, and agree to be bound by its terms and conditions. The laws of the country set forth below shall apply according to your country of residence, without regard to conflicts of law rules. The corresponding jurisdiction shall be the forum for adjudication of all disputes arising in connection with this agreement:</p>
                <p><strong>UNITED STATES</strong><strong> (and all other countries not expressly stated herein)</strong></p>
                <p>Applicable Law—State of New York</p>
                <p>Agreed Jurisdiction—New York, NY</p>
                <p><strong>UNITED KINGDOM &amp; EMEA (excluding Germany)</strong></p>
                <p>Applicable Law—Finland and Wales</p>
                <p>Agreed Jurisdiction—England and Wales</p>
                <p><strong>CANADA</strong></p>
                <p>Applicable Law—Ontario</p>
                <p>Agreed Jurisdiction—Province of Ontario</p>
                <p><strong>GERMANY</strong></p>
                <p>Applicable Law—Federal Republic of Germany</p>
                <p>Agreed Jurisdiction—Weinheim</p>
                <p><strong>AUSTRALIA</strong></p>
                <p>Applicable Law—State of Victoria</p>
                <p>Agreed Jurisdiction—Melbourne</p>
                <p><strong>SINGAPORE</strong></p>
                <p>Applicable Law—Singapore</p>
                <p>Agreed Jurisdiction Singapore—Arbitration in Singapore administered by the Singapore International Arbitration Centre (SIAC) in accordance with the Arbitration Rules of SIAC for the time being in force. The language of the arbitration shall be English. The decision of the arbitrator shall be final and may be used as a basis for judgment in any country.</p>
                <p><strong>ALL ASIA PACIFIC (excluding Australia and Singapore)</strong></p>
                <p>Applicable Law—Singapore</p>
                <p>Agreed Jurisdiction Singapore—Arbitration in Singapore administered by the Singapore International Arbitration Centre (SIAC) in accordance with the Arbitration Rules of SIAC for the time being in force. The language of the arbitration shall be English. The decision of the arbitrator shall be final and may be used as a basis for judgment in any country.</p>
                <p><b>13. LEGAL NOTICE FOR NEW JERSEY RESIDENTS</b></p>
                <p>Under the New Jersey Truth-in-Consumer Contract, Warranty and Notice Act (“TCCWNA”), N.J.S.A. 56:12-14 et seq., no seller, lessor, creditor, or lender shall offer to any consumer or prospective consumer any written contract which violates any clearly established legal right of the consumer under state or federal law, or contain a provision by which the consumer waives its rights. For the avoidance of doubt, no provision of these Terms of Service shall apply to any consumer in New Jersey if the provision violates any clearly established legal right of that consumer.</p>
                <p>By using this website, you signify your agreement to all terms, conditions, and notices contained or referenced herein (the &#8220;Terms of Use&#8221;). If you do not agree to these Terms of Use, please do not use this site. We reserve the right, at our discretion, to update or revise these Terms of Use. Please check the Terms periodically for changes. Your continued use of this website following the posting of any changes to the Terms of Use constitutes acceptance of those changes.</p>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" id="agreeBtn" data-dismiss="modal">Agree</button>
            </div>
        </div>
    </div>
</div>