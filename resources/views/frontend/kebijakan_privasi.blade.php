@extends('frontend.layouts.app')

@section('style')
<style>
    .privacy-policy-text{
        font-size: 18px;
        line-height: normal;
        text-align: justify;
    }
    li{
        font-size: 18px;
        line-height: normal;
        margin-bottom: 1rem;
    }
</style>
@endsection

@section('content')
<section style="background-color: #fcf8F0;">
    <div class="container pt-4 pb-5" style="font-weight: 600;">
        <div style="background: #FACAC3 url({{ asset('frontend/images/atribut.png') }}) no-repeat center center; background-size: cover; padding: 100px 0;">
            {{-- <p class="mb-0 font-weight-bold text-center" style="font-size: 64px; color: white; -webkit-text-stroke-width: 1px; -webkit-text-stroke-color: black;">OH HAPPY SKIN.</p> --}}
        </div>
        <div class="text-center py-5">
            <h1 class="mb-0 font-weight-bold">KEBIJAKAN PRIVASI</h1>
        </div>
        <p class="privacy-policy-text">This website or mobile application (Site) is owned and operated by Ponny Beaute Indonesia. Ponny Beaute takes your privacy seriously. This Privacy Policy describes what information this Site gathers about you, how we use that information, and what steps we take to protect that information.
        <br> By using this Site, you consent to the terms of this Privacy Policy as well as the Site Terms and Conditions we may change this Privacy Policy from time to time.
        Please check back periodically for up-to-date information about our privacy practices.</p>
        <p class="privacy-policy-text">1. INFORMATION COLLECTION <br>
            This Site collects information about you to provide and improve our services, communicate offers that we believe will interest you, and to administer our business.</p>
        <p class="privacy-policy-text">Information You Provide to Us</p>
        <p class="privacy-policy-text">We collect personal information from you when you submit that information to us voluntarily. For example, we collect information from you when you:</p>
        <p class="privacy-policy-text">- place an order on the Site; <br>
            - create an account on the Site; <br>
            - participate in our rewards program; <br>
            - communicate with our customer service team online; <br>
            - participate in an Ponny Beaute promotion, such as a sweepstakes or contest; <br>
            - post a tagged photo or other content on a third party social network in response to our request; or <br>
            - post a product review, question, answer, or other information on the Site;</p>
        <p class="privacy-policy-text">The personal information we collect may include the following: email address, mailing/billing address, phone number, payment card number, and other payment
            information. Collecting this information allows us to complete your order efficiently, to notify you of your order status, and provide personalized interactions. If
            we ask for such information from you, we will either tell you how we will use the information or we will use it in conformity with this Privacy Policy.
            <br>We may use the personal information you provide to allow you to send message to your friends via this Site. When you use these features on our Site, you represent to us that you are entitled to use and give us your friend’s name and contact information, including email address.</p>
        <p class="privacy-policy-text">Information from Third Party Sources</p>
        <p class="privacy-policy-text">We may collect information about you from third parties. Such information may include demographic data (like the number of members of your household, age,
            and gender) and purchase preference information. We may use this information to supplement or update our records, improve the quality or personalization of
            our communications to you, and help prevent or detect fraud.</p>
        <p class="privacy-policy-text">Automated Information Collection</p>
        <p class="privacy-policy-text">We automatically receive and store certain types of information when you interact with our Site, our emails, and/or our online advertisements. This information
            helps us to make our Site work more efficiently, evaluate use of our Site, and support our website analytics and marketing campaigns. Here are some of the types
            of information we may automatically receive:</p>
        <p class="privacy-policy-text">Technical information like your internet protocol (IP) address, your device operating system and browser type, your referring website’s address, and your clickstream through our Site <br>
            Cookies that recognize you as you use or return to our Site. The cookies allow the Site to provide you a more continuous and personalized shopping experience.
            Cookies are small text files that a website or email saves to your browser and stores on your hard drive.
            Web beacons that allow us to know what pages on our Site have been visited, what emails have been opened, and if our banner ads have been effective.
        </p>
        <p class="privacy-policy-text">Cookies</p>
        <p class="privacy-policy-text">Our Site uses cookies. Cookies are pieces of information that a website transfers to your computer’s hard drive for record-keeping purposes. We use cookies to
            track your preferences and purchases as you navigate through our Site and to save you from having to re-enter information every time you visit our Site. By
            using cookies to track your visits, we can make your next shopping experience on our Site better. To search our Site and/or place an order, you need to have the
            cookies feature of your web browser turned on. We may also use technologies, such as our own cookies, to provide you with personalized online display advertising tailored to your interests. To opt out of our cookies used for this online advertising e-mail us at concierge@ponnybeaute.co.id. Most web browsers allow you
            to exercise control over cookies by deleting them, blocking them, or alerting you when a cookie file is stored. Please review your browser’s instructions on these
            functions. If you choose to disable the cookies feature of your web browser, you may not be able to place an order or otherwise use some or all of the features
            provided on our Site. If you disable, block, or delete cookies, not all of the tracking described in this Privacy Policy will stop.</p>
        <p class="privacy-policy-text">Interest-Based Advertising</p>
        <p class="privacy-policy-text">We collect personal information about users over time and across different websites when you use this Site. We also have third parties that collect personal information this way. For example, we may use one or more third-party online advertising networks to serve ads on our behalf on third party websites. The third-party
            ad network may collect information about your visits to our Site and your interaction with our online ads. For example, it may keep track of how many of our ads
            you saw before visiting our Site. This is primarily accomplished using technology such as cookies, action tags, web beacons, and/or GIF tags which are placed in
            various places within our Site and our online ads.</p>
        <p class="privacy-policy-text">We may share information with third-party ad networks in an aggregate form to help us analyze and improve our Site and our online ads. The third-party ad networks may use information about your visit to our Site and other websites in order to provide you with ads about goods and services that may be of interest to
            you. For example, if you browse for information about mascara products on our Site or on third party websites, we or the online ad network may show you ads for
            mascara products. If you opt-out of interest-based ads, you will still see ads on websites you visit, but those ads will not be based on your browsing behavior.</p>
        <p class="privacy-policy-text">Some browsers have a ‘do not track’ feature that lets you tell websites that you do not want to have your online activities tracked. These features are not yet uniform, so our Site is not currently designed to respond to those signals.</p>
        <p class="privacy-policy-text">Mobile Applications and Website</p>
        <p class="privacy-policy-text">When you download or use our mobile application or mobile website, we may receive information about your location and your mobile device. This information
            may include the type of mobile device you use, the temporary or persistent unique device identifier (UDID) placed by us or our service providers, the unique
            identifier assigned by Ponny Beaute to your device, the IP address of your device, your mobile operating system, the type of mobile web browser you use, and
            data from the way you use our mobile application/website.</p>
        <p class="privacy-policy-text">Our mobile application/website may also collect information about the location of your device. Your device should require you to provide permission before our
            mobile application/website obtains location information from technologies like GPS, Wi-Fi, and/or cell towers. We and our service providers may use this information, along with other information submitted by you, to provide you with location-based services like local store information, search results, special offers, and
            other personalized content.</p>
        <p class="privacy-policy-text">Most mobile devices allow users to disable location services by using controls located in the device’s settings menu. If you have questions about how to disable
            your device’s location services, please contact your mobile service carrier or your device manufacturer. You may also stop collection of information by our mobile
            application by uninstalling the mobile application using the standard uninstall process available as part of your mobile device.</p>
        <p class="privacy-policy-text">If you uninstall our mobile application from your device, the unique Ponny Beaute identifier associated with your device may continue to be stored. If you re-install our mobile application on the same device, Ponny Beaute may be able to re-associate this identifier to your previous transactions.</p>
        <p class="privacy-policy-text">Social Media Widgets and Single Sign-On Services </p>
        <p class="privacy-policy-text">This Site uses third party social media widgets such as buttons or similar mechanisms from Facebook,Twitter, Instagram, Pinterest, YouTube, and/or FourSquare.
            Such third party features may collect information about you, like your IP address and the page(s) you visit on the Site. They may also place cookies on your
            device. These social media widgets are either hosted by a third party or by our Site. Your interactions with those features are governed by the privacy policies of
            the third party social media networks that provide them.</p>
        <p class="privacy-policy-text">Children Under 13 Years of Age</p>
        <p class="privacy-policy-text">This Site is directed to adults, and does not knowingly collect personal information online from children under the age of 13 without prior parental consent. If you
            are the parent or guardian of a child under the age of 13, and you believe your child has provided personal information to our Site that you would like us to
            delete,please e-mail us at concierge@ponnybeaute.co.id.</p>
        <p class="privacy-policy-text">2. INFORMATION USE, DISCLOSURE, AND SHARING <br>
            The information we collect on this Site may be used to fulfill your requests (such as product orders and responses to email questions), to support our core business functions (such as order fulfillment, internal business process management, authentication, loss and fraud prevention, and public safety functions), and to
            communicate with you about our product offers and promotions. When you create an account with us, we offer the opportunity to become a member of Ponny
            Beaute’s Subscription Program, so you may receive future discounts, gifts and Ponnybeaute.co.id e-mail. You can also sign up for our e-mail list by providing your
            e-mail address through our Site services or our affiliated retail stores.</p>
        <p class="privacy-policy-text">To accomplish these purposes, we may combine personal and non-personal information we collect with offline information, including information from third parties. We may also transfer or disclose your information within our corporate family of companies for these purposes.</p>
        <p class="privacy-policy-text">We may make third party services, including third party applications, available to you on this Site. You may choose to allow us to share your information with
            those third party services. We require such third party services to give you notice of their privacy policy so you can review it before authorizing them to access
            your information.</p>
        <p class="privacy-policy-text">We may disclose your personal information to identify you to anyone to whom you send messages via the Site. You may also disclose your own personal information on interactive services such as message boards, product reviews, question-and-answer pages, profile pages, and social network features offered by us or by
            third parties. Information you post or disclose through such interactive services may be available to the general public. Please exercise caution when deciding
            whether to disclose your personal information, location, or similar information via this Site</p>
    </div>
</section>
@endsection

@section('script')

@endsection