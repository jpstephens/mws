<?php
/**
 * Volleyball Tournament Registration - WordPress Shortcode Template
 * Rendered via [mws_volleyball] shortcode in alone-child theme
 */
?>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

<style>
    /* Hide WordPress page title bar */
    .page-titlebar { display: none !important; }

    /* Scoped styles for volleyball registration */
    #mws-volleyball {
        font-family: 'Poppins', sans-serif;
        line-height: 1.6;
        color: #111827;
        -webkit-font-smoothing: antialiased;
        margin: 0 !important;
        padding: 0 !important;
    }

    #mws-volleyball *,
    #mws-volleyball *::before,
    #mws-volleyball *::after {
        box-sizing: border-box;
    }

    #mws-volleyball {
        --white: #ffffff;
        --gray-50: #f9fafb;
        --gray-100: #f3f4f6;
        --gray-200: #e5e7eb;
        --gray-300: #d1d5db;
        --gray-500: #6b7280;
        --gray-600: #4b5563;
        --gray-800: #1f2937;
        --gray-900: #111827;
        --navy: #232842;
        --gold: #cda33b;
        --gold-light: #b8930e;
        --gold-bg: #fef9e7;
        --red: #dc2626;
        --green: #059669;
    }

    /* ==========================================
       HERO BANNER
       ========================================== */
    #mws-volleyball .vb-hero {
        background:
            linear-gradient(135deg, rgba(26, 31, 52, 0.48), rgba(35, 40, 66, 0.58) 50%, rgba(42, 48, 82, 0.48)),
            var(--hero-image) center center / cover no-repeat;
        min-height: clamp(300px, 46vw, 430px);
        padding: 0;
        text-align: center;
        position: relative;
        overflow: hidden;
        margin: 0;
        border-radius: 0;
        display: flex;
        align-items: flex-end;
        justify-content: center;
    }

    #mws-volleyball .vb-hero::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        height: 3px;
        background: linear-gradient(90deg, var(--gold), var(--gold-light), var(--gold));
    }

    #mws-volleyball .vb-hero-overlay {
        position: relative;
        z-index: 1;
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
        padding: clamp(34px, 5vw, 52px) 16px clamp(24px, 4vw, 38px);
        width: min(1100px, 100%);
        margin: 0 auto;
    }

    #mws-volleyball .vb-hero h1 {
        color: var(--white);
        font-size: 44px;
        font-weight: 700;
        margin: 0 0 14px;
        text-shadow: none;
    }

    @media (min-width: 768px) {
        #mws-volleyball .vb-hero h1 { font-size: 46px; }
    }

    #mws-volleyball .hero-meta span {
        font-size: 14px;
        font-weight: 600;
        color: #fff;
        background: rgba(255,255,255,0.12);
        padding: 6px 16px;
        border-radius: 20px;
        white-space: nowrap;
    }

    #mws-volleyball .hero-price {
        background: rgba(255,255,255,0.10);
        backdrop-filter: blur(8px);
        border: 1px solid rgba(255,255,255,0.18);
        border-radius: 10px;
        padding: 10px 24px;
        text-align: center;
        color: var(--white);
    }

    @media (max-width: 768px) {
        #mws-volleyball .vb-hero { min-height: 280px; }
        #mws-volleyball .vb-hero h1 { font-size: 32px; }
    }

    /* ==========================================
       MAIN LAYOUT - Two column: info left, registration right
       ========================================== */
    #mws-volleyball .vb-main {
        max-width: 1100px;
        margin: 0 auto;
        padding: 24px 16px 40px;
    }

    @media (min-width: 768px) {
        #mws-volleyball .vb-main {
            display: grid;
            grid-template-columns: 1fr 420px;
            gap: 32px;
            padding: 0 24px 48px;
            align-items: start;
        }
    }

    @media (min-width: 1024px) {
        #mws-volleyball .vb-main {
            grid-template-columns: 1fr 480px;
            gap: 48px;
            padding: 0 32px 64px;
        }
    }

    /* ==========================================
       LEFT SIDE - INFO (Desktop Only)
       ========================================== */
    #mws-volleyball .info-section {
        display: none;
    }

    @media (min-width: 768px) {
        #mws-volleyball .info-section {
            display: block;
            order: -1;
        }
    }

    /* ==========================================
       REGISTRATION CARD
       ========================================== */
    #mws-volleyball .register-card {
        background: var(--white);
        border-radius: 16px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.08);
        overflow: hidden;
    }

    @media (min-width: 768px) {
        #mws-volleyball .register-card {
            position: sticky;
            top: 24px;
        }
    }

    #mws-volleyball .card-header {
        padding: 18px 24px;
        border-bottom: 1px solid var(--gray-200);
        background: var(--gray-50);
    }

    #mws-volleyball .card-header h2 {
        font-size: 18px;
        font-weight: 700;
        margin: 0;
    }

    #mws-volleyball .card-header p {
        font-size: 14px;
        color: var(--gray-600);
        margin-top: 2px;
        margin-bottom: 0;
    }

    #mws-volleyball .card-body {
        padding: 24px;
    }

    @media (max-width: 767px) {
        #mws-volleyball .card-body {
            padding: 18px;
        }
    }

    /* ==========================================
       REGISTRATION TYPE OPTIONS
       ========================================== */
    #mws-volleyball .reg-types {
        display: flex;
        flex-direction: column;
        gap: 10px;
    }

    #mws-volleyball .reg-type {
        display: flex;
        align-items: center;
        gap: 14px;
        padding: 14px 16px;
        min-height: 56px;
        background: var(--white);
        border: 2px solid var(--gray-200);
        border-radius: 12px;
        cursor: pointer;
        transition: all 0.15s ease;
    }

    #mws-volleyball .reg-type:hover {
        border-color: var(--gold);
        background: var(--gold-bg);
    }

    #mws-volleyball .reg-type .icon {
        font-size: 26px;
        flex-shrink: 0;
    }

    #mws-volleyball .reg-type .info {
        flex: 1;
        min-width: 0;
    }

    #mws-volleyball .reg-type .title {
        font-size: 15px;
        font-weight: 700;
        color: var(--gray-900);
    }

    #mws-volleyball .reg-type .desc {
        font-size: 12px;
        color: var(--gray-600);
        margin-top: 2px;
        line-height: 1.4;
    }

    #mws-volleyball .reg-type .price-info {
        text-align: right;
        flex-shrink: 0;
    }

    #mws-volleyball .reg-type .price {
        font-size: 18px;
        font-weight: 700;
        color: var(--gold);
        display: block;
    }

    #mws-volleyball .reg-type .price-note {
        font-size: 10px;
        color: var(--gray-500);
        display: block;
    }

    /* ==========================================
       INFO CARDS (shared between desktop & mobile)
       ========================================== */
    #mws-volleyball .info-card {
        background: var(--white);
        border-radius: 12px;
        padding: 20px;
        margin-bottom: 16px;
        border: 1px solid var(--gray-200);
    }

    #mws-volleyball .info-card:last-child {
        margin-bottom: 0;
    }

    #mws-volleyball .info-card h3 {
        font-size: 12px;
        font-weight: 700;
        color: var(--gray-500);
        text-transform: uppercase;
        letter-spacing: 0.05em;
        margin-bottom: 12px;
    }

    #mws-volleyball .info-card ul {
        list-style: none;
        margin: 0;
        padding: 0;
    }

    #mws-volleyball .info-card li {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 8px 0;
        font-size: 14px;
        color: var(--gray-800);
        border-bottom: 1px solid var(--gray-100);
    }

    #mws-volleyball .info-card li:last-child {
        border-bottom: none;
        padding-bottom: 0;
    }

    #mws-volleyball .info-card .icon {
        font-size: 16px;
        width: 22px;
        text-align: center;
        flex-shrink: 0;
    }

    #mws-volleyball .info-row {
        display: flex;
        justify-content: space-between;
        padding: 8px 0;
        font-size: 14px;
        border-bottom: 1px solid var(--gray-100);
    }

    #mws-volleyball .info-row:last-child {
        border-bottom: none;
        padding-bottom: 0;
    }

    #mws-volleyball .info-row .label {
        color: var(--gray-500);
    }

    #mws-volleyball .info-row .value {
        font-weight: 600;
        color: var(--gray-900);
    }

    /* Info header (desktop left column) */
    #mws-volleyball .info-header {
        margin-bottom: 20px;
    }

    #mws-volleyball .info-header h2 {
        font-size: 28px;
        font-weight: 800;
        color: var(--gray-900);
        line-height: 1.2;
        margin-bottom: 10px;
    }

    #mws-volleyball .info-header p {
        font-size: 15px;
        color: var(--gray-600);
        line-height: 1.6;
        margin: 0;
    }

    /* Price boxes */
    #mws-volleyball .info-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 12px;
        margin-bottom: 16px;
    }

    #mws-volleyball .info-box {
        background: var(--white);
        border-radius: 12px;
        padding: 16px;
        text-align: center;
        border: 1px solid var(--gray-200);
    }

    #mws-volleyball .info-box .amount {
        font-size: 28px;
        font-weight: 800;
        color: var(--gold);
    }

    #mws-volleyball .info-box .label {
        font-size: 13px;
        font-weight: 600;
        color: var(--gray-600);
        margin-top: 2px;
    }

    /* ==========================================
       MOBILE INFO (shown below registration on mobile)
       ========================================== */
    #mws-volleyball .mobile-info {
        margin-top: 24px;
    }

    @media (min-width: 768px) {
        #mws-volleyball .mobile-info {
            display: none;
        }
    }

    /* ==========================================
       FORMS
       ========================================== */
    #mws-volleyball .form-section {
        display: none;
    }

    #mws-volleyball .form-section.active {
        display: block;
    }

    #mws-volleyball .back-link {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        font-size: 14px;
        font-weight: 600;
        color: var(--gray-500);
        cursor: pointer;
        margin-bottom: 16px;
        padding: 4px 0;
    }

    #mws-volleyball .back-link:hover {
        color: var(--gray-900);
    }

    #mws-volleyball .form-title {
        font-size: 17px;
        font-weight: 700;
        margin-bottom: 20px;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    #mws-volleyball .form-group {
        margin-bottom: 18px;
    }

    #mws-volleyball .form-group:last-of-type {
        margin-bottom: 24px;
    }

    #mws-volleyball label {
        display: block;
        font-size: 13px;
        font-weight: 600;
        color: var(--gray-800);
        margin-bottom: 6px;
    }

    #mws-volleyball label .required {
        color: var(--red);
    }

    #mws-volleyball input,
    #mws-volleyball select {
        width: 100%;
        font-size: 16px;
        font-family: inherit;
        padding: 12px 14px;
        border: 2px solid var(--gray-300);
        border-radius: 10px;
        background: var(--white);
        color: var(--gray-900);
        transition: all 0.15s ease;
    }

    #mws-volleyball input:focus,
    #mws-volleyball select:focus {
        outline: none;
        border-color: var(--gold);
        box-shadow: 0 0 0 3px rgba(184, 134, 11, 0.15);
    }

    #mws-volleyball input::placeholder {
        color: var(--gray-500);
    }

    #mws-volleyball .hint {
        font-size: 12px;
        color: var(--gray-500);
        margin-top: 6px;
    }

    #mws-volleyball .form-row {
        display: grid;
        grid-template-columns: 1fr;
        gap: 16px;
    }

    @media (min-width: 480px) {
        #mws-volleyball .form-row {
            grid-template-columns: 1fr 1fr;
        }
    }

    /* Division Picker */
    #mws-volleyball .division-picker {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 10px;
    }

    #mws-volleyball .division-option {
        padding: 14px 12px;
        background: var(--white);
        border: 2px solid var(--gray-300);
        border-radius: 10px;
        cursor: pointer;
        transition: all 0.15s ease;
        text-align: center;
    }

    #mws-volleyball .division-option:hover {
        border-color: var(--gold);
    }

    #mws-volleyball .division-option.selected {
        border-color: var(--gold);
        background: var(--gold-bg);
    }

    #mws-volleyball .division-option input { display: none; }

    #mws-volleyball .division-option .name {
        font-size: 14px;
        font-weight: 700;
        color: var(--gray-900);
    }

    #mws-volleyball .division-option .details {
        font-size: 11px;
        color: var(--gray-600);
        margin-top: 2px;
    }

    /* Payment Picker */
    #mws-volleyball .payment-picker {
        display: flex;
        flex-direction: column;
        gap: 8px;
    }

    #mws-volleyball .payment-option {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 12px 14px;
        background: var(--white);
        border: 2px solid var(--gray-300);
        border-radius: 10px;
        cursor: pointer;
        transition: all 0.15s ease;
    }

    #mws-volleyball .payment-option:hover {
        border-color: var(--gold);
    }

    #mws-volleyball .payment-option.selected {
        border-color: var(--gold);
        background: var(--gold-bg);
    }

    #mws-volleyball .payment-option input[type="radio"] {
        width: 18px;
        height: 18px;
        accent-color: var(--gold);
        flex-shrink: 0;
    }

    #mws-volleyball .payment-option .text {
        font-size: 14px;
        font-weight: 600;
        color: var(--gray-900);
    }

    /* Roster List */
    #mws-volleyball .roster-list {
        display: flex;
        flex-direction: column;
        gap: 10px;
        margin-bottom: 12px;
    }

    #mws-volleyball .roster-row {
        display: grid;
        grid-template-columns: 1fr 1fr 40px;
        gap: 8px;
        align-items: center;
    }

    @media (max-width: 480px) {
        #mws-volleyball .roster-row {
            grid-template-columns: 1fr 40px;
        }
        #mws-volleyball .roster-row input[name="roster_email[]"],
        #mws-volleyball .roster-row input[name="paid_email[]"] {
            grid-column: 1;
        }
    }

    #mws-volleyball .roster-row input {
        padding: 12px 14px;
        font-size: 15px;
        border: 2px solid var(--gray-300);
        border-radius: 8px;
        background: var(--white);
    }

    #mws-volleyball .roster-row input:focus {
        outline: none;
        border-color: var(--gold);
        box-shadow: 0 0 0 3px rgba(184, 134, 11, 0.15);
    }

    #mws-volleyball .roster-row input::placeholder {
        color: var(--gray-500);
    }

    #mws-volleyball .roster-remove {
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: var(--gray-100);
        border: none;
        border-radius: 8px;
        color: var(--gray-500);
        font-size: 20px;
        cursor: pointer;
        transition: all 0.15s ease;
    }

    #mws-volleyball .roster-remove:hover {
        background: #fee2e2;
        color: #dc2626;
    }

    #mws-volleyball .add-roster-btn {
        width: 100%;
        padding: 12px;
        background: var(--white);
        border: 2px dashed var(--gray-300);
        border-radius: 8px;
        color: var(--gray-600);
        font-size: 14px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.15s ease;
    }

    #mws-volleyball .add-roster-btn:hover {
        border-color: var(--gold);
        color: var(--gold);
        background: var(--gold-bg);
    }

    /* Submit Button */
    #mws-volleyball .btn {
        width: 100%;
        padding: 14px 24px;
        background: var(--gold);
        color: var(--white);
        border: none;
        border-radius: 10px;
        font-size: 15px;
        font-weight: 700;
        cursor: pointer;
        transition: all 0.15s ease;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
    }

    #mws-volleyball .btn:hover {
        background: var(--gold-light);
    }

    #mws-volleyball .btn:disabled {
        background: #9ca3af;
        cursor: not-allowed;
    }

    #mws-volleyball .spinner {
        width: 18px;
        height: 18px;
        border: 2px solid rgba(255,255,255,0.3);
        border-top-color: var(--white);
        border-radius: 50%;
        animation: mws-spin 0.8s linear infinite;
    }

    @keyframes mws-spin { to { transform: rotate(360deg); } }

    /* Success State */
    #mws-volleyball .success-state {
        text-align: center;
        padding: 24px 16px;
    }

    #mws-volleyball .success-state .icon {
        font-size: 56px;
        margin-bottom: 12px;
    }

    #mws-volleyball .success-state h3 {
        font-size: 20px;
        font-weight: 700;
        margin-bottom: 8px;
    }

    #mws-volleyball .success-state p {
        font-size: 14px;
        color: var(--gray-600);
        margin-bottom: 20px;
    }

    #mws-volleyball .share-link-box {
        background: var(--gray-100);
        border: 2px solid var(--gray-300);
        border-radius: 10px;
        padding: 14px;
        margin-bottom: 20px;
        text-align: left;
    }

    #mws-volleyball .share-link-box .label {
        font-size: 12px;
        font-weight: 600;
        color: var(--gray-600);
        margin-bottom: 8px;
    }

    #mws-volleyball .share-link-box .link-row {
        display: flex;
        gap: 8px;
    }

    #mws-volleyball .share-link-box input {
        flex: 1;
        font-size: 13px;
        padding: 10px 12px;
        background: var(--white);
    }

    #mws-volleyball .share-link-box .copy-btn {
        padding: 10px 14px;
        background: var(--gray-800);
        color: var(--white);
        border: none;
        border-radius: 8px;
        font-size: 13px;
        font-weight: 600;
        cursor: pointer;
        flex-shrink: 0;
    }

    #mws-volleyball .share-link-box .copy-btn:hover {
        background: var(--gray-900);
    }

    #mws-volleyball .btn-secondary {
        background: var(--gray-100);
        color: var(--gray-800);
        border: 2px solid var(--gray-300);
    }

    #mws-volleyball .btn-secondary:hover {
        border-color: var(--gold);
        background: var(--gold-bg);
    }

    /* Join Team Banner */
    #mws-volleyball .join-banner {
        background: var(--gold-bg);
        border: 2px solid var(--gold);
        border-radius: 12px;
        padding: 16px 18px;
        margin-bottom: 20px;
        text-align: center;
    }

    #mws-volleyball .join-banner .team-name {
        font-size: 18px;
        font-weight: 700;
        color: var(--gray-900);
    }

    #mws-volleyball .join-banner .captain {
        font-size: 13px;
        color: var(--gray-600);
        margin-top: 4px;
    }

    /* Team Lookup */
    #mws-volleyball .lookup-tabs {
        display: flex;
        gap: 8px;
        margin-bottom: 20px;
    }

    #mws-volleyball .lookup-tab {
        flex: 1;
        padding: 12px 16px;
        background: var(--gray-100);
        border: 2px solid var(--gray-200);
        border-radius: 8px;
        font-size: 14px;
        font-weight: 600;
        color: var(--gray-600);
        cursor: pointer;
        transition: all 0.15s ease;
    }

    #mws-volleyball .lookup-tab:hover {
        border-color: var(--gold);
        color: var(--gray-800);
    }

    #mws-volleyball .lookup-tab.active {
        background: var(--gold-bg);
        border-color: var(--gold);
        color: var(--gray-900);
    }

    #mws-volleyball .lookup-panel {
        display: none;
    }

    #mws-volleyball .lookup-panel.active {
        display: block;
    }

    #mws-volleyball .lookup-hint {
        font-size: 14px;
        color: var(--gray-600);
        margin-bottom: 12px;
    }

    #mws-volleyball .code-input-wrap {
        display: flex;
        flex-direction: column;
        gap: 12px;
    }

    #mws-volleyball .code-input {
        width: 100%;
        font-size: 24px;
        font-weight: 700;
        text-align: center;
        letter-spacing: 8px;
        text-transform: uppercase;
        padding: 16px;
        border: 2px solid var(--gray-300);
        border-radius: 10px;
    }

    #mws-volleyball .code-input:focus {
        outline: none;
        border-color: var(--gold);
        box-shadow: 0 0 0 3px rgba(184, 134, 11, 0.15);
    }

    #mws-volleyball .code-input::placeholder {
        letter-spacing: 4px;
        color: #9ca3af;
    }

    #mws-volleyball .code-input-wrap .btn {
        width: 100%;
    }

    #mws-volleyball .lookup-error {
        margin-top: 12px;
        padding: 12px;
        background: #fef2f2;
        border: 1px solid #fecaca;
        border-radius: 8px;
        color: #dc2626;
        font-size: 14px;
    }

    #mws-volleyball .search-input-wrap {
        margin-bottom: 16px;
    }

    #mws-volleyball .search-input {
        width: 100%;
        padding: 14px 16px;
        font-size: 16px;
        border: 2px solid var(--gray-300);
        border-radius: 10px;
    }

    #mws-volleyball .search-input:focus {
        outline: none;
        border-color: var(--gold);
        box-shadow: 0 0 0 3px rgba(184, 134, 11, 0.15);
    }

    #mws-volleyball .search-results {
        max-height: 240px;
        overflow-y: auto;
    }

    #mws-volleyball .search-empty {
        text-align: center;
        padding: 24px;
        color: var(--gray-500);
        font-size: 14px;
    }

    #mws-volleyball .search-result {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 14px 16px;
        background: var(--white);
        border: 2px solid var(--gray-200);
        border-radius: 10px;
        margin-bottom: 8px;
        cursor: pointer;
        transition: all 0.15s ease;
    }

    #mws-volleyball .search-result:hover {
        border-color: var(--gold);
        background: var(--gold-bg);
    }

    #mws-volleyball .search-result .team-info .name {
        font-size: 15px;
        font-weight: 700;
        color: var(--gray-900);
    }

    #mws-volleyball .search-result .team-info .captain {
        font-size: 13px;
        color: var(--gray-500);
    }

    #mws-volleyball .search-result .join-arrow {
        font-size: 18px;
        color: var(--gold);
    }

    #mws-volleyball .search-loading {
        text-align: center;
        padding: 20px;
        color: var(--gray-500);
    }

    #mws-volleyball .hidden { display: none !important; }

    /* Policy / Trust Block */
    #mws-volleyball .policy-block {
        margin-top: 20px;
        padding: 18px 20px;
        background: var(--gray-50);
        border: 1px solid var(--gray-200);
        border-radius: 12px;
    }

    #mws-volleyball .policy-block ul {
        list-style: none;
        margin: 0;
        padding: 0;
    }

    #mws-volleyball .policy-block li {
        display: flex;
        align-items: flex-start;
        gap: 8px;
        font-size: 13px;
        color: var(--gray-600);
        line-height: 1.5;
        padding: 5px 0;
    }

    #mws-volleyball .policy-block li .policy-icon {
        flex-shrink: 0;
        font-size: 14px;
        line-height: 1.5;
    }

    #mws-volleyball .policy-block .refund-note {
        font-size: 12px;
        color: var(--gray-500);
        margin-top: 10px;
        text-align: center;
    }
</style>

<div id="mws-volleyball">
    <!-- HERO BANNER with tournament image -->
    <div class="vb-hero" style="--hero-image: url('<?php echo esc_url(get_stylesheet_directory_uri() . '/images/tournament.jpg'); ?>');">
        <div class="vb-hero-overlay">
            <h1><span aria-hidden="true">&#127912;</span> <span>Mikey's</span> Beach Volleyball Tournament</h1>
            <div class="hero-meta">
                <span><span aria-hidden="true">&#128197;</span> March 21, 2026</span>
                <span><span aria-hidden="true">&#128205;</span> Great American Center, Aberdeen NJ</span>
                <span><span aria-hidden="true">&#9200;</span> 12&ndash;3 PM</span>
            </div>
            <div class="hero-prices">
                <div class="hero-price">
                    <span class="amount">$120</span>
                    <span class="label">Player</span>
                </div>
                <div class="hero-price">
                    <span class="amount">$50</span>
                    <span class="label">Spectator</span>
                </div>
            </div>
        </div>
    </div>

    <main class="vb-main">
        <!-- LEFT: Info Section (Desktop Only) -->
        <aside class="info-section">
            <div class="info-header">
                <h2>Play Volleyball.<br>Support Scholarships.</h2>
                <p>Join us for the Annual Michael Williams Scholarship Beach Volleyball Tournament. All proceeds fund scholarships for RFH students who share Mikey's creative spirit.</p>
            </div>

            <div class="info-grid">
                <div class="info-box">
                    <div class="amount">$120</div>
                    <div class="label">Per Player</div>
                </div>
                <div class="info-box">
                    <div class="amount">$50</div>
                    <div class="label">Spectators</div>
                </div>
            </div>

            <div class="info-card">
                <h3>What's Included</h3>
                <ul>
                    <li><span class="icon" aria-hidden="true">&#127912;</span> 4+ volleyball games</li>
                    <li><span class="icon" aria-hidden="true">&#127829;</span> Food</li>
                    <li><span class="icon" aria-hidden="true">&#127866;</span> 2 Drinks</li>
                    <li><span class="icon" aria-hidden="true">&#128085;</span> Player swag</li>
                    <li><span class="icon" aria-hidden="true">&#127918;</span> Free side game token</li>
                    <li><span class="icon" aria-hidden="true">&#127942;</span> Prizes for top teams</li>
                </ul>
            </div>

            <div class="info-card">
                <h3>Event Details</h3>
                <div class="info-row">
                    <span class="label">Date</span>
                    <span class="value">Saturday, March 21, 2026</span>
                </div>
                <div class="info-row">
                    <span class="label">Time</span>
                    <span class="value">12 PM &ndash; 3 PM</span>
                </div>
                <div class="info-row">
                    <span class="label">Location</span>
                    <span class="value">Great American Center (Aberdeen, NJ)</span>
                </div>
                <div class="info-row">
                    <span class="label">Team Size</span>
                    <span class="value">4&ndash;10 players</span>
                </div>
                <div class="info-row">
                    <span class="label">Divisions</span>
                    <span class="value">Rec 6v6 &amp; Competitive 4v4</span>
                </div>
            </div>
        </aside>

        <!-- RIGHT: Registration Card -->
        <div class="register-card">
            <!-- STEP 1: Choose Type -->
            <div class="form-section active" id="stepChoose">
                <div class="card-header">
                    <h2>Register Now</h2>
                    <p>Annual Event &mdash; All proceeds fund scholarships for RFH students</p>
                </div>
                <div class="card-body">
                    <div class="reg-types">
                        <div class="reg-type" onclick="showForm('captain')">
                            <span class="icon" aria-hidden="true">&#128081;</span>
                            <div class="info">
                                <div class="title">Start a Team</div>
                                <div class="desc">Create your team, get a link to share with teammates</div>
                            </div>
                            <div class="price-info">
                                <span class="price">$120</span>
                                <span class="price-note">per player</span>
                            </div>
                        </div>
                        <div class="reg-type" onclick="showForm('joinlookup')">
                            <span class="icon" aria-hidden="true">&#129309;</span>
                            <div class="info">
                                <div class="title">Join a Team</div>
                                <div class="desc">Your captain already registered? Find your team</div>
                            </div>
                            <div class="price-info">
                                <span class="price">$120</span>
                                <span class="price-note">per player</span>
                            </div>
                        </div>
                        <div class="reg-type" onclick="showForm('freeagent')">
                            <span class="icon" aria-hidden="true">&#128587;</span>
                            <div class="info">
                                <div class="title">I Need a Team</div>
                                <div class="desc">Don't have a team? We'll match you with others</div>
                            </div>
                            <div class="price-info">
                                <span class="price">$120</span>
                                <span class="price-note">per player</span>
                            </div>
                        </div>
                        <div class="reg-type" onclick="showForm('spectator')">
                            <span class="icon" aria-hidden="true">&#128064;</span>
                            <div class="info">
                                <div class="title">Spectator</div>
                                <div class="desc">Come hang out&mdash;food, drinks &amp; 1 free side game</div>
                            </div>
                            <div class="price-info">
                                <span class="price">$50</span>
                                <span class="price-note">per person</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- CAPTAIN FORM -->
            <div class="form-section" id="formCaptain">
                <div class="card-body">
                    <div class="back-link" onclick="goBack()">&#8592; Back</div>
                    <div class="form-title"><span aria-hidden="true">&#128081;</span> Start a Team</div>

                    <form id="captainForm" onsubmit="submitCaptain(event)">
                        <div class="form-group">
                            <label for="cap_name">Your Name <span class="required">*</span></label>
                            <input type="text" id="cap_name" name="name" required placeholder="Full name" autocomplete="name" aria-required="true">
                        </div>

                        <div class="form-group">
                            <div class="form-row">
                                <div>
                                    <label for="cap_email">Email <span class="required">*</span></label>
                                    <input type="email" id="cap_email" name="email" required placeholder="you@email.com" autocomplete="email" aria-required="true">
                                </div>
                                <div>
                                    <label for="cap_phone">Phone <span class="required">*</span></label>
                                    <input type="tel" id="cap_phone" name="phone" required placeholder="(555) 123-4567" autocomplete="tel" aria-required="true">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="cap_team_name">Team Name <span class="required">*</span></label>
                            <input type="text" id="cap_team_name" name="team_name" required placeholder="e.g., Sandy Spikers" aria-required="true">
                        </div>

                        <div class="form-group">
                            <label>Division <span class="required">*</span></label>
                            <div class="division-picker">
                                <label class="division-option" onclick="selectOption(this)">
                                    <input type="radio" name="division" value="rec_6s" required>
                                    <div class="name">&#127880; Rec</div>
                                    <div class="details">6v6 &middot; All levels</div>
                                </label>
                                <label class="division-option" onclick="selectOption(this)">
                                    <input type="radio" name="division" value="competitive_4s">
                                    <div class="name">&#128293; Competitive</div>
                                    <div class="details">4v4 &middot; Experienced</div>
                                </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Players I am paying for <span style="color: var(--gray-500); font-weight: 400;">(other than myself)</span></label>
                            <p class="hint" style="margin-bottom: 12px;">These players will be registered and receive a confirmation email. You'll pay for them at checkout.</p>
                            <div class="roster-list" id="paidRosterList">
                                <div class="roster-row paid-roster-row">
                                    <input type="text" name="paid_name[]" placeholder="Name" oninput="updateCaptainTotal()">
                                    <input type="email" name="paid_email[]" placeholder="Email" oninput="updateCaptainTotal()">
                                    <button type="button" class="roster-remove" onclick="removePaidRosterRow(this)">&times;</button>
                                </div>
                            </div>
                            <button type="button" class="add-roster-btn" onclick="addPaidRosterRow()">+ Add Another Player</button>
                        </div>

                        <div class="form-group">
                            <label>Players I want to invite to register on my team <span style="color: var(--gray-500); font-weight: 400;">(optional)</span></label>
                            <p class="hint" style="margin-bottom: 12px;">Add teammates now and they'll get an email invite to register. You can also share the team link later.</p>
                            <div class="roster-list" id="rosterList">
                                <div class="roster-row">
                                    <input type="text" name="roster_name[]" placeholder="Name">
                                    <input type="email" name="roster_email[]" placeholder="Email">
                                    <button type="button" class="roster-remove" onclick="removeRosterRow(this)">&times;</button>
                                </div>
                            </div>
                            <button type="button" class="add-roster-btn" onclick="addRosterRow()">+ Add Another Teammate</button>
                        </div>

                        <div class="form-group">
                            <label>Payment <span class="required">*</span></label>
                            <div class="payment-picker">
                                <label class="payment-option" onclick="selectOption(this)">
                                    <input type="radio" name="payment" value="card" required>
                                    <span class="text">&#128179; Pay by Card</span>
                                </label>
                                <label class="payment-option" onclick="selectOption(this)">
                                    <input type="radio" name="payment" value="check">
                                    <span class="text">&#128236; Mail a Check</span>
                                </label>
                            </div>
                        </div>

                        <button type="submit" class="btn">
                            <span class="btn-text">Register Team &mdash; $120</span>
                            <span class="spinner hidden"></span>
                        </button>
                    </form>
                </div>
            </div>

            <!-- CAPTAIN SUCCESS -->
            <div class="form-section" id="successCaptain">
                <div class="card-body">
                    <div class="success-state">
                        <div class="icon">&#127881;</div>
                        <h3>Team Created!</h3>
                        <p>Share this link with your teammates so they can join:</p>

                        <div class="share-link-box">
                            <div class="label">Team invite link:</div>
                            <div class="link-row">
                                <input type="text" id="teamLinkInput" readonly>
                                <button type="button" class="copy-btn" onclick="copyLink()">Copy</button>
                            </div>
                        </div>

                        <p style="font-size: 13px; color: var(--gray-500);">Check your email for confirmation and payment details.</p>

                        <button type="button" class="btn btn-secondary" onclick="resetAll()" style="margin-top: 16px;">Register Someone Else</button>
                    </div>
                </div>
            </div>

            <!-- JOIN TEAM LOOKUP -->
            <div class="form-section" id="formJoinLookup">
                <div class="card-body">
                    <div class="back-link" onclick="goBack()">&#8592; Back</div>
                    <div class="form-title"><span aria-hidden="true">&#129309;</span> Find Your Team</div>

                    <div class="lookup-tabs">
                        <button type="button" class="lookup-tab active" onclick="switchLookupTab('code')">Enter Code</button>
                        <button type="button" class="lookup-tab" onclick="switchLookupTab('search')">Search by Name</button>
                    </div>

                    <!-- Code Entry -->
                    <div class="lookup-panel active" id="lookupCode">
                        <p class="lookup-hint">Ask your captain for the 6-character team code</p>
                        <div class="code-input-wrap">
                            <input type="text" id="teamCodeInput" maxlength="6" placeholder="ABC123" class="code-input" oninput="this.value = this.value.toUpperCase()">
                            <button type="button" class="btn" onclick="lookupByCode()">Find Team</button>
                        </div>
                        <div class="lookup-error hidden" id="codeError">Team not found. Check the code and try again.</div>
                    </div>

                    <!-- Search by Name -->
                    <div class="lookup-panel" id="lookupSearch">
                        <p class="lookup-hint">Search for your team by name</p>
                        <div class="search-input-wrap">
                            <input type="text" id="teamSearchInput" placeholder="Team name..." class="search-input" oninput="searchTeams()">
                        </div>
                        <div class="search-results" id="searchResults">
                            <div class="search-empty">Type to search for teams</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- JOIN TEAM FORM -->
            <div class="form-section" id="formJoin">
                <div class="card-body">
                    <div class="back-link" onclick="showSection('formJoinLookup')">&#8592; Back to search</div>
                    <div class="join-banner">
                        <div class="team-name" id="joinTeamName">Team Name</div>
                        <div class="captain">Captain: <span id="joinCaptainName">Captain Name</span></div>
                    </div>

                    <div class="form-title"><span aria-hidden="true">&#127939;</span> Join This Team</div>

                    <form id="joinForm" onsubmit="submitJoin(event)">
                        <input type="hidden" name="team_code" id="joinTeamCode">

                        <div class="form-group">
                            <label for="join_name">Your Name <span class="required">*</span></label>
                            <input type="text" id="join_name" name="name" required placeholder="Full name" autocomplete="name" aria-required="true">
                        </div>

                        <div class="form-group">
                            <div class="form-row">
                                <div>
                                    <label for="join_email">Email <span class="required">*</span></label>
                                    <input type="email" id="join_email" name="email" required placeholder="you@email.com" autocomplete="email" aria-required="true">
                                </div>
                                <div>
                                    <label for="join_phone">Phone <span class="required">*</span></label>
                                    <input type="tel" id="join_phone" name="phone" required placeholder="(555) 123-4567" autocomplete="tel" aria-required="true">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Payment <span class="required">*</span></label>
                            <div class="payment-picker">
                                <label class="payment-option" onclick="selectOption(this)">
                                    <input type="radio" name="payment" value="card" required>
                                    <span class="text">&#128179; Pay by Card &mdash; $120</span>
                                </label>
                                <label class="payment-option" onclick="selectOption(this)">
                                    <input type="radio" name="payment" value="check">
                                    <span class="text">&#128236; Mail a Check</span>
                                </label>
                            </div>
                        </div>

                        <button type="submit" class="btn">
                            <span class="btn-text">Join Team &mdash; $120</span>
                            <span class="spinner hidden"></span>
                        </button>
                    </form>
                </div>
            </div>

            <!-- FREE AGENT FORM -->
            <div class="form-section" id="formFreeagent">
                <div class="card-body">
                    <div class="back-link" onclick="goBack()">&#8592; Back</div>
                    <div class="form-title"><span aria-hidden="true">&#128587;</span> I Need a Team</div>

                    <form id="freeagentForm" onsubmit="submitFreeagent(event)">
                        <div class="form-group">
                            <label for="fa_name">Your Name <span class="required">*</span></label>
                            <input type="text" id="fa_name" name="name" required placeholder="Full name" autocomplete="name" aria-required="true">
                        </div>

                        <div class="form-group">
                            <div class="form-row">
                                <div>
                                    <label for="fa_email">Email <span class="required">*</span></label>
                                    <input type="email" id="fa_email" name="email" required placeholder="you@email.com" autocomplete="email" aria-required="true">
                                </div>
                                <div>
                                    <label for="fa_phone">Phone <span class="required">*</span></label>
                                    <input type="tel" id="fa_phone" name="phone" required placeholder="(555) 123-4567" autocomplete="tel" aria-required="true">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Skill Level <span class="required">*</span></label>
                            <div class="division-picker">
                                <label class="division-option" onclick="selectOption(this)">
                                    <input type="radio" name="skill" value="rec_6s" required>
                                    <div class="name">&#127880; Casual 6x6</div>
                                    <div class="details">Just here to have fun</div>
                                </label>
                                <label class="division-option" onclick="selectOption(this)">
                                    <input type="radio" name="skill" value="competitive_4s">
                                    <div class="name">&#128293; Competitive 4x4</div>
                                    <div class="details">I'm pretty decent</div>
                                </label>
                            </div>
                            <p class="hint">We'll match you with a team at your level.</p>
                        </div>

                        <div class="form-group">
                            <label>Payment <span class="required">*</span></label>
                            <div class="payment-picker">
                                <label class="payment-option" onclick="selectOption(this)">
                                    <input type="radio" name="payment" value="card" required>
                                    <span class="text">&#128179; Pay by Card</span>
                                </label>
                                <label class="payment-option" onclick="selectOption(this)">
                                    <input type="radio" name="payment" value="check">
                                    <span class="text">&#128236; Mail a Check</span>
                                </label>
                            </div>
                        </div>

                        <button type="submit" class="btn">
                            <span class="btn-text">Register &mdash; $120</span>
                            <span class="spinner hidden"></span>
                        </button>
                    </form>
                </div>
            </div>

            <!-- SPECTATOR FORM -->
            <div class="form-section" id="formSpectator">
                <div class="card-body">
                    <div class="back-link" onclick="goBack()">&#8592; Back</div>
                    <div class="form-title"><span aria-hidden="true">&#128064;</span> Spectator</div>

                    <form id="spectatorForm" onsubmit="submitSpectator(event)">
                        <div class="form-group">
                            <label for="spec_name">Your Name <span class="required">*</span></label>
                            <input type="text" id="spec_name" name="name" required placeholder="Full name" autocomplete="name" aria-required="true">
                        </div>

                        <div class="form-group">
                            <div class="form-row">
                                <div>
                                    <label for="spec_email">Email <span class="required">*</span></label>
                                    <input type="email" id="spec_email" name="email" required placeholder="you@email.com" autocomplete="email" aria-required="true">
                                </div>
                                <div>
                                    <label for="spec_phone">Phone <span class="required">*</span></label>
                                    <input type="tel" id="spec_phone" name="phone" required placeholder="(555) 123-4567" autocomplete="tel" aria-required="true">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Payment <span class="required">*</span></label>
                            <div class="payment-picker">
                                <label class="payment-option" onclick="selectOption(this)">
                                    <input type="radio" name="payment" value="card" required>
                                    <span class="text">&#128179; Pay by Card</span>
                                </label>
                                <label class="payment-option" onclick="selectOption(this)">
                                    <input type="radio" name="payment" value="check">
                                    <span class="text">&#128236; Mail a Check</span>
                                </label>
                            </div>
                        </div>

                        <button type="submit" class="btn">
                            <span class="btn-text">Register &mdash; $50</span>
                            <span class="spinner hidden"></span>
                        </button>
                    </form>
                </div>
            </div>

            <!-- GENERIC SUCCESS -->
            <div class="form-section" id="successGeneric">
                <div class="card-body">
                    <div class="success-state">
                        <div class="icon">&#127881;</div>
                        <h3>You're Registered!</h3>
                        <p>Check your email for confirmation and next steps. See you March 21, 2026!</p>
                        <button type="button" class="btn btn-secondary" onclick="resetAll()">Register Someone Else</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Policy / Trust Info -->
        <div class="policy-block">
            <ul>
                <li><span class="policy-icon" aria-hidden="true">&#9993;</span> You'll receive a confirmation email with registration details</li>
                <li><span class="policy-icon" aria-hidden="true">&#127891;</span> All proceeds fund the Michael Williams Memorial Scholarship for RFH students</li>
                <li><span class="policy-icon" aria-hidden="true">&#128172;</span> Questions? Contact <a href="mailto:info@michaelwilliamsscholarship.com" style="color: var(--gold); text-decoration: none;">info@michaelwilliamsscholarship.com</a></li>
            </ul>
            <p class="refund-note">Registration fees are non-refundable. Contact us if you have any issues.</p>
        </div>

        <!-- MOBILE: Info Below Registration -->
        <div class="mobile-info">
            <div class="info-card">
                <h3>What's Included</h3>
                <ul>
                    <li><span class="icon" aria-hidden="true">&#127912;</span> 4+ volleyball games</li>
                    <li><span class="icon" aria-hidden="true">&#127829;</span> Food</li>
                    <li><span class="icon" aria-hidden="true">&#127866;</span> 2 Drinks</li>
                    <li><span class="icon" aria-hidden="true">&#128085;</span> Player swag</li>
                    <li><span class="icon" aria-hidden="true">&#127918;</span> Free side game token</li>
                    <li><span class="icon" aria-hidden="true">&#127942;</span> Prizes for top teams</li>
                </ul>
            </div>
            <div class="info-card">
                <h3>Event Details</h3>
                <div class="info-row">
                    <span class="label">Date</span>
                    <span class="value">Saturday, March 21, 2026</span>
                </div>
                <div class="info-row">
                    <span class="label">Time</span>
                    <span class="value">12 PM &ndash; 3 PM</span>
                </div>
                <div class="info-row">
                    <span class="label">Location</span>
                    <span class="value">Great American Center (Aberdeen, NJ)</span>
                </div>
                <div class="info-row">
                    <span class="label">Team Size</span>
                    <span class="value">4&ndash;10 players</span>
                </div>
            </div>
        </div>
    </main>
</div>

<script src="https://cdn.jsdelivr.net/npm/@supabase/supabase-js@2"></script>
<script>
    const SUPABASE_URL = 'https://rhqefcihaeovyhtxfccs.supabase.co';
    const SUPABASE_ANON_KEY = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6InJocWVmY2loYWVvdnlodHhmY2NzIiwicm9sZSI6ImFub24iLCJpYXQiOjE3NjYxMTcwMzIsImV4cCI6MjA4MTY5MzAzMn0.MiycEzpruo4liIPFac_V98TUo_mmFfT6SB5IclfIpmc';

    let db = null;
    try {
        if (window.supabase) {
            db = window.supabase.createClient(SUPABASE_URL, SUPABASE_ANON_KEY);
        }
    } catch (e) {
        console.error('Supabase init error:', e);
    }

    let currentTeamData = null;

    function generateCode() {
        const chars = 'ABCDEFGHJKLMNPQRSTUVWXYZ23456789';
        let code = '';
        for (let i = 0; i < 6; i++) {
            code += chars.charAt(Math.floor(Math.random() * chars.length));
        }
        return code;
    }

    function showSection(id) {
        document.querySelectorAll('#mws-volleyball .form-section').forEach(s => s.classList.remove('active'));
        document.getElementById(id).classList.add('active');
    }

    function showForm(type) {
        if (type === 'captain') showSection('formCaptain');
        else if (type === 'joinlookup') showSection('formJoinLookup');
        else if (type === 'freeagent') showSection('formFreeagent');
        else if (type === 'spectator') showSection('formSpectator');
    }

    function goBack() {
        showSection('stepChoose');
    }

    function resetAll() {
        document.querySelectorAll('#mws-volleyball form').forEach(f => f.reset());
        document.querySelectorAll('#mws-volleyball .division-option, #mws-volleyball .payment-option').forEach(o => o.classList.remove('selected'));
        document.getElementById('teamCodeInput').value = '';
        document.getElementById('teamSearchInput').value = '';
        document.getElementById('searchResults').innerHTML = '<div class="search-empty">Type to search for teams</div>';
        document.getElementById('codeError').classList.add('hidden');
        const paidList = document.getElementById('paidRosterList');
        paidList.innerHTML = '<div class="roster-row paid-roster-row">' +
            '<input type="text" name="paid_name[]" placeholder="Name">' +
            '<input type="email" name="paid_email[]" placeholder="Email">' +
            '<button type="button" class="roster-remove" onclick="removePaidRosterRow(this)">&times;</button>' +
            '</div>';
        updateCaptainTotal();
        showSection('stepChoose');
    }

    function switchLookupTab(tab) {
        document.querySelectorAll('#mws-volleyball .lookup-tab').forEach(t => t.classList.remove('active'));
        document.querySelectorAll('#mws-volleyball .lookup-panel').forEach(p => p.classList.remove('active'));

        if (tab === 'code') {
            document.querySelector('#mws-volleyball .lookup-tab:first-child').classList.add('active');
            document.getElementById('lookupCode').classList.add('active');
        } else {
            document.querySelector('#mws-volleyball .lookup-tab:last-child').classList.add('active');
            document.getElementById('lookupSearch').classList.add('active');
        }
    }

    async function lookupByCode() {
        const code = document.getElementById('teamCodeInput').value.trim().toUpperCase();
        const errorEl = document.getElementById('codeError');
        errorEl.classList.add('hidden');

        if (code.length !== 6) {
            errorEl.textContent = 'Please enter a 6-character code.';
            errorEl.classList.remove('hidden');
            return;
        }

        if (db) {
            const { data, error } = await db
                .from('volleyball_registrations')
                .select('*')
                .eq('team_code', code)
                .single();

            if (error || !data) {
                errorEl.textContent = 'Team not found. Check the code and try again.';
                errorEl.classList.remove('hidden');
                return;
            }

            selectTeam(data);
        } else {
            selectTeam({
                name: 'Demo Captain',
                team_name: 'Demo Team',
                team_code: code
            });
        }
    }

    let searchTimeout = null;
    async function searchTeams() {
        const query = document.getElementById('teamSearchInput').value.trim();
        const resultsEl = document.getElementById('searchResults');

        if (query.length < 2) {
            resultsEl.innerHTML = '<div class="search-empty">Type at least 2 characters to search</div>';
            return;
        }

        clearTimeout(searchTimeout);
        searchTimeout = setTimeout(async () => {
            resultsEl.innerHTML = '<div class="search-loading">Searching...</div>';

            if (db) {
                const { data, error } = await db
                    .from('volleyball_registrations')
                    .select('*')
                    .eq('registration_type', 'captain')
                    .ilike('team_name', `%${query}%`)
                    .limit(10);

                if (error || !data || data.length === 0) {
                    resultsEl.innerHTML = '<div class="search-empty">No teams found matching "' + query + '"</div>';
                    return;
                }

                resultsEl.innerHTML = data.map(team => `
                    <div class="search-result" onclick="selectTeamById('${team.team_code}')">
                        <div class="team-info">
                            <div class="name">${team.team_name}</div>
                            <div class="captain">Captain: ${team.name}</div>
                        </div>
                        <span class="join-arrow">&rarr;</span>
                    </div>
                `).join('');
            } else {
                resultsEl.innerHTML = `
                    <div class="search-result" onclick="selectTeam({name: 'Demo Captain', team_name: 'Demo Team', team_code: 'DEMO01'})">
                        <div class="team-info">
                            <div class="name">Demo Team</div>
                            <div class="captain">Captain: Demo Captain</div>
                        </div>
                        <span class="join-arrow">&rarr;</span>
                    </div>
                `;
            }
        }, 300);
    }

    async function selectTeamById(code) {
        if (db) {
            const { data, error } = await db
                .from('volleyball_registrations')
                .select('*')
                .eq('team_code', code)
                .single();

            if (!error && data) {
                selectTeam(data);
            }
        }
    }

    function selectTeam(data) {
        currentTeamData = data;
        document.getElementById('joinTeamName').textContent = data.team_name;
        document.getElementById('joinCaptainName').textContent = data.name;
        document.getElementById('joinTeamCode').value = data.team_code;

        showSection('formJoin');
    }

    function selectOption(el) {
        const container = el.closest('.division-picker, .payment-picker');
        container.querySelectorAll('.division-option, .payment-option').forEach(o => o.classList.remove('selected'));
        el.classList.add('selected');
    }

    function addPaidRosterRow() {
        const list = document.getElementById('paidRosterList');
        const row = document.createElement('div');
        row.className = 'roster-row paid-roster-row';
        row.innerHTML = '<input type="text" name="paid_name[]" placeholder="Name" oninput="updateCaptainTotal()">' +
            '<input type="email" name="paid_email[]" placeholder="Email" oninput="updateCaptainTotal()">' +
            '<button type="button" class="roster-remove" onclick="removePaidRosterRow(this)">&times;</button>';
        list.appendChild(row);
        updateCaptainTotal();
    }

    function removePaidRosterRow(btn) {
        const rows = document.querySelectorAll('#paidRosterList .roster-row');
        if (rows.length > 1) {
            btn.closest('.roster-row').remove();
        } else {
            const row = btn.closest('.roster-row');
            row.querySelectorAll('input').forEach(input => input.value = '');
        }
        updateCaptainTotal();
    }

    function updateCaptainTotal() {
        const rows = document.querySelectorAll('#paidRosterList .roster-row');
        const filledRows = [...rows].filter(row => {
            const name = row.querySelector('input[name="paid_name[]"]').value.trim();
            const email = row.querySelector('input[name="paid_email[]"]').value.trim();
            return name || email;
        });
        const total = 120 * (1 + filledRows.length);
        const btnText = document.querySelector('#captainForm .btn .btn-text');
        if (btnText) {
            btnText.textContent = 'Register Team \u2014 $' + total;
        }
    }

    function addRosterRow() {
        const list = document.getElementById('rosterList');
        const row = document.createElement('div');
        row.className = 'roster-row';
        row.innerHTML = '<input type="text" name="roster_name[]" placeholder="Name">' +
            '<input type="email" name="roster_email[]" placeholder="Email">' +
            '<button type="button" class="roster-remove" onclick="removeRosterRow(this)">&times;</button>';
        list.appendChild(row);
    }

    function removeRosterRow(btn) {
        const list = document.getElementById('rosterList');
        const rows = list.querySelectorAll('.roster-row');
        if (rows.length > 1) {
            btn.closest('.roster-row').remove();
        } else {
            const row = btn.closest('.roster-row');
            row.querySelectorAll('input').forEach(input => input.value = '');
        }
    }

    function setLoading(form, loading) {
        const btn = form.querySelector('.btn');
        const text = btn.querySelector('.btn-text');
        const spinner = btn.querySelector('.spinner');
        btn.disabled = loading;
        spinner.classList.toggle('hidden', !loading);
        if (loading) {
            text.dataset.original = text.textContent;
            text.textContent = 'Submitting...';
        } else {
            text.textContent = text.dataset.original || text.textContent;
        }
    }

    async function submitCaptain(e) {
        e.preventDefault();
        const form = e.target;
        setLoading(form, true);

        try {
            const fd = new FormData(form);
            const teamCode = generateCode();

            const data = {
                registration_type: 'captain',
                name: fd.get('name'),
                email: fd.get('email'),
                phone: fd.get('phone'),
                team_name: fd.get('team_name'),
                team_group: fd.get('division'),
                payment_method: fd.get('payment'),
                payment_status: fd.get('payment') === 'card' ? 'pending' : 'check_pending',
                team_code: teamCode
            };

            const paidNames = fd.getAll('paid_name[]');
            const paidEmails = fd.getAll('paid_email[]');
            const paidRosterEntries = paidNames
                .map((name, i) => ({
                    player_name: name.trim(),
                    player_email: paidEmails[i]?.trim() || null,
                    is_paid_by_captain: true,
                    invite_sent: false
                }))
                .filter(entry => entry.player_name || entry.player_email);

            const rosterNames = fd.getAll('roster_name[]');
            const rosterEmails = fd.getAll('roster_email[]');
            const inviteRosterEntries = rosterNames
                .map((name, i) => ({
                    player_name: name.trim(),
                    player_email: rosterEmails[i]?.trim() || null,
                    is_paid_by_captain: false,
                    invite_sent: false
                }))
                .filter(entry => entry.player_name || entry.player_email);

            const allRosterEntries = [...paidRosterEntries, ...inviteRosterEntries];
            const totalAmount = 120 * (1 + paidRosterEntries.length);

            if (db) {
                const { data: reg, error } = await db
                    .from('volleyball_registrations')
                    .insert([data])
                    .select()
                    .single();

                if (error) throw error;

                if (allRosterEntries.length > 0) {
                    const rosterWithRegId = allRosterEntries.map(entry => ({
                        ...entry,
                        registration_id: reg.id
                    }));

                    const { error: rosterError } = await db
                        .from('volleyball_team_roster')
                        .insert(rosterWithRegId);

                    if (rosterError) {
                        console.error('Roster save error:', rosterError);
                    }
                }

                const emailHeaders = {
                    'Authorization': 'Bearer ' + SUPABASE_ANON_KEY,
                    'Content-Type': 'application/json'
                };

                try {
                    await fetch(SUPABASE_URL + '/functions/v1/send-email', {
                        method: 'POST',
                        headers: emailHeaders,
                        body: JSON.stringify({
                            type: 'confirmation',
                            to: data.email,
                            data: { name: data.name, amount: '$' + totalAmount, registrationType: 'Captain', paymentStatus: data.payment_status, teamName: data.team_name }
                        })
                    });
                } catch (emailErr) {
                    console.error('Captain email error:', emailErr);
                }

                for (const player of paidRosterEntries) {
                    if (player.player_email) {
                        try {
                            await fetch(SUPABASE_URL + '/functions/v1/send-email', {
                                method: 'POST',
                                headers: emailHeaders,
                                body: JSON.stringify({
                                    type: 'confirmation',
                                    to: player.player_email,
                                    data: { name: player.player_name, amount: '$120', registrationType: 'Player (paid by captain)', paymentStatus: 'Paid by captain', teamName: data.team_name }
                                })
                            });
                        } catch (emailErr) {
                            console.error('Paid player email error:', emailErr);
                        }
                    }
                }

                const baseUrl = window.location.origin + window.location.pathname;
                for (const player of inviteRosterEntries) {
                    if (player.player_email) {
                        try {
                            await fetch(SUPABASE_URL + '/functions/v1/send-email', {
                                method: 'POST',
                                headers: emailHeaders,
                                body: JSON.stringify({
                                    type: 'invite',
                                    to: player.player_email,
                                    data: { name: player.player_name, captainName: data.name, teamName: data.team_name, joinUrl: baseUrl + '?join=' + teamCode }
                                })
                            });
                        } catch (emailErr) {
                            console.error('Invite email error:', emailErr);
                        }
                    }
                }
            } else {
                console.log('Demo mode:', data, 'Paid:', paidRosterEntries, 'Invites:', inviteRosterEntries, 'Total:', totalAmount);
                await new Promise(r => setTimeout(r, 800));
            }

            const baseUrl = window.location.origin + window.location.pathname;
            const teamLink = baseUrl + '?join=' + teamCode;
            document.getElementById('teamLinkInput').value = teamLink;
            showSection('successCaptain');

        } catch (err) {
            console.error(err);
            alert('Something went wrong. Please try again.');
        } finally {
            setLoading(form, false);
        }
    }

    async function submitFreeagent(e) {
        e.preventDefault();
        const form = e.target;
        setLoading(form, true);

        try {
            const fd = new FormData(form);

            const data = {
                registration_type: 'free_agent',
                name: fd.get('name'),
                email: fd.get('email'),
                phone: fd.get('phone'),
                skill_level: fd.get('skill'),
                payment_method: fd.get('payment'),
                payment_status: fd.get('payment') === 'card' ? 'pending' : 'check_pending'
            };

            if (db) {
                const { error } = await db.from('volleyball_registrations').insert([data]);
                if (error) throw error;
            } else {
                console.log('Demo mode:', data);
                await new Promise(r => setTimeout(r, 800));
            }

            showSection('successGeneric');

        } catch (err) {
            console.error(err);
            alert('Something went wrong. Please try again.');
        } finally {
            setLoading(form, false);
        }
    }

    async function submitSpectator(e) {
        e.preventDefault();
        const form = e.target;
        setLoading(form, true);

        try {
            const fd = new FormData(form);

            const data = {
                registration_type: 'spectator',
                name: fd.get('name'),
                email: fd.get('email'),
                phone: fd.get('phone'),
                payment_method: fd.get('payment'),
                payment_status: fd.get('payment') === 'card' ? 'pending' : 'check_pending'
            };

            if (db) {
                const { error } = await db.from('volleyball_registrations').insert([data]);
                if (error) throw error;
            } else {
                console.log('Demo mode:', data);
                await new Promise(r => setTimeout(r, 800));
            }

            showSection('successGeneric');

        } catch (err) {
            console.error(err);
            alert('Something went wrong. Please try again.');
        } finally {
            setLoading(form, false);
        }
    }

    async function submitJoin(e) {
        e.preventDefault();
        const form = e.target;
        setLoading(form, true);

        try {
            const fd = new FormData(form);

            const data = {
                registration_type: 'player',
                name: fd.get('name'),
                email: fd.get('email'),
                phone: fd.get('phone'),
                captain_name: currentTeamData.name,
                payment_method: fd.get('payment'),
                payment_status: fd.get('payment') === 'card' ? 'pending' : 'check_pending'
            };

            if (db) {
                const { error } = await db.from('volleyball_registrations').insert([data]);
                if (error) throw error;
            } else {
                console.log('Demo mode:', data);
                await new Promise(r => setTimeout(r, 800));
            }

            showSection('successGeneric');

        } catch (err) {
            console.error(err);
            alert('Something went wrong. Please try again.');
        } finally {
            setLoading(form, false);
        }
    }

    function copyLink() {
        const input = document.getElementById('teamLinkInput');
        input.select();
        document.execCommand('copy');
        const btn = input.nextElementSibling;
        btn.textContent = 'Copied!';
        setTimeout(() => btn.textContent = 'Copy', 2000);
    }

    async function checkJoinCode() {
        const params = new URLSearchParams(window.location.search);
        const joinCode = params.get('join');

        if (!joinCode) return;

        if (db) {
            const { data, error } = await db
                .from('volleyball_registrations')
                .select('*')
                .eq('team_code', joinCode)
                .single();

            if (error || !data) {
                alert('Invalid or expired team link.');
                return;
            }

            selectTeam(data);
        } else {
            selectTeam({
                name: 'Demo Captain',
                team_name: 'Demo Team',
                team_code: joinCode
            });
        }
    }

    document.addEventListener('DOMContentLoaded', () => {
        checkJoinCode();
        console.log('Volleyball page loaded. Supabase:', !!db);
    });
</script>
