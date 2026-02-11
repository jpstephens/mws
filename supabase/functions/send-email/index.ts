import { serve } from "https://deno.land/std@0.168.0/http/server.ts";

const RESEND_API_KEY = Deno.env.get("RESEND_API_KEY");
const FROM_EMAIL = Deno.env.get("FROM_EMAIL") || "Mikey's Tournament <noreply@michaelwilliamsmemorialscholarship.com>";
const EVENT_URL = Deno.env.get("EVENT_URL") || "https://michaelwilliamsmemorialscholarship.com";

const corsHeaders = {
  "Access-Control-Allow-Origin": "*",
  "Access-Control-Allow-Headers": "authorization, x-client-info, apikey, content-type",
};

// Email template: Signup Confirmation
function getConfirmationHtml(data: {
  name: string;
  amount: string;
  registrationType: string;
  paymentStatus: string;
  teamName?: string;
}): string {
  const paymentDisplay = data.paymentStatus === "pending"
    ? "Card — pending"
    : data.paymentStatus === "check_pending"
    ? "Check — pending"
    : data.paymentStatus === "Paid by captain"
    ? "Paid by captain"
    : data.paymentStatus;

  return `<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>You're Registered! - Mikey's Beach Volleyball Tournament</title>
</head>
<body style="margin: 0; padding: 0; background-color: #f3f4f6; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;">
    <table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="background-color: #f3f4f6;">
        <tr>
            <td align="center" style="padding: 40px 20px;">
                <table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="max-width: 520px; background-color: #ffffff; border-radius: 16px; overflow: hidden; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);">
                    <tr>
                        <td style="background-color: #111827; padding: 32px 40px; text-align: center;">
                            <h1 style="margin: 0; color: #ffffff; font-size: 24px; font-weight: 800;">
                                🏐 <span style="color: #daa520;">Mikey's</span> Beach Volleyball Tournament
                            </h1>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 40px;">
                            <div style="text-align: center; margin-bottom: 24px;">
                                <span style="font-size: 64px;">🎉</span>
                            </div>
                            <h2 style="margin: 0 0 8px 0; font-size: 28px; font-weight: 700; color: #111827; text-align: center;">
                                You're Registered!
                            </h2>
                            <p style="margin: 0 0 32px 0; font-size: 16px; color: #6b7280; text-align: center;">
                                Thanks for signing up, ${data.name}
                            </p>
                            <table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="background-color: #f9fafb; border-radius: 12px; margin-bottom: 24px;">
                                <tr>
                                    <td style="padding: 24px;">
                                        <h3 style="margin: 0 0 16px 0; font-size: 13px; font-weight: 700; color: #6b7280; text-transform: uppercase; letter-spacing: 0.05em;">
                                            Registration Details
                                        </h3>
                                        <table role="presentation" width="100%" cellspacing="0" cellpadding="0">
                                            <tr>
                                                <td style="padding: 8px 0; border-bottom: 1px solid #e5e7eb;">
                                                    <span style="color: #6b7280; font-size: 14px;">Type</span>
                                                </td>
                                                <td style="padding: 8px 0; border-bottom: 1px solid #e5e7eb; text-align: right;">
                                                    <span style="color: #111827; font-size: 14px; font-weight: 600;">${data.registrationType}</span>
                                                </td>
                                            </tr>
                                            ${data.teamName ? `<tr>
                                                <td style="padding: 8px 0; border-bottom: 1px solid #e5e7eb;">
                                                    <span style="color: #6b7280; font-size: 14px;">Team</span>
                                                </td>
                                                <td style="padding: 8px 0; border-bottom: 1px solid #e5e7eb; text-align: right;">
                                                    <span style="color: #111827; font-size: 14px; font-weight: 600;">${data.teamName}</span>
                                                </td>
                                            </tr>` : ""}
                                            <tr>
                                                <td style="padding: 8px 0; border-bottom: 1px solid #e5e7eb;">
                                                    <span style="color: #6b7280; font-size: 14px;">Amount</span>
                                                </td>
                                                <td style="padding: 8px 0; border-bottom: 1px solid #e5e7eb; text-align: right;">
                                                    <span style="color: #b8860b; font-size: 14px; font-weight: 700;">${data.amount}</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding: 8px 0;">
                                                    <span style="color: #6b7280; font-size: 14px;">Payment</span>
                                                </td>
                                                <td style="padding: 8px 0; text-align: right;">
                                                    <span style="color: #111827; font-size: 14px; font-weight: 600;">${paymentDisplay}</span>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                            <table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="background-color: #fef9e7; border: 2px solid #b8860b; border-radius: 12px; margin-bottom: 32px;">
                                <tr>
                                    <td style="padding: 24px;">
                                        <h3 style="margin: 0 0 16px 0; font-size: 13px; font-weight: 700; color: #92400e; text-transform: uppercase; letter-spacing: 0.05em;">
                                            Event Details
                                        </h3>
                                        <table role="presentation" width="100%" cellspacing="0" cellpadding="0">
                                            <tr>
                                                <td style="padding: 6px 0;">
                                                    <span style="font-size: 15px; color: #111827;">📅 <strong>Saturday, March 21, 2026</strong></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding: 6px 0;">
                                                    <span style="font-size: 15px; color: #111827;">⏰ <strong>12 PM – 4 PM</strong></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding: 6px 0;">
                                                    <span style="font-size: 15px; color: #111827;">📍 <strong>Great American Center (Aberdeen, NJ)</strong></span>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                            <h3 style="margin: 0 0 12px 0; font-size: 16px; font-weight: 700; color: #111827;">
                                What's Next?
                            </h3>
                            <ul style="margin: 0 0 32px 0; padding-left: 20px; color: #4b5563; font-size: 15px; line-height: 1.8;">
                                <li>Add the event to your calendar</li>
                                <li>Complete payment if you haven't already</li>
                                <li>We'll send a reminder as the event gets closer</li>
                            </ul>
                            <table role="presentation" width="100%" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td align="center">
                                        <a href="${EVENT_URL}" style="display: inline-block; padding: 16px 32px; background-color: #b8860b; color: #ffffff; text-decoration: none; font-size: 16px; font-weight: 700; border-radius: 10px;">
                                            View Event Details
                                        </a>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td style="background-color: #111827; padding: 24px 40px; text-align: center;">
                            <p style="margin: 0 0 8px 0; color: #ffffff; font-size: 14px; font-weight: 600;">
                                Michael Williams Memorial Scholarship
                            </p>
                            <p style="margin: 0; color: #9ca3af; font-size: 13px;">
                                501(c)(3) Nonprofit • All proceeds fund scholarships
                            </p>
                        </td>
                    </tr>
                </table>
                <p style="margin: 24px 0 0 0; font-size: 12px; color: #9ca3af; text-align: center;">
                    Questions? Reply to this email or visit <a href="https://michaelwilliamsmemorialscholarship.com" style="color: #b8860b;">our website</a>
                </p>
            </td>
        </tr>
    </table>
</body>
</html>`;
}

// Email template: Team Invite
function getInviteHtml(data: {
  name: string;
  captainName: string;
  teamName: string;
  joinUrl: string;
}): string {
  return `<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>You've Been Invited! - Mikey's Beach Volleyball Tournament</title>
</head>
<body style="margin: 0; padding: 0; background-color: #f3f4f6; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;">
    <table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="background-color: #f3f4f6;">
        <tr>
            <td align="center" style="padding: 40px 20px;">
                <table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="max-width: 520px; background-color: #ffffff; border-radius: 16px; overflow: hidden; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);">
                    <tr>
                        <td style="background-color: #111827; padding: 32px 40px; text-align: center;">
                            <h1 style="margin: 0; color: #ffffff; font-size: 24px; font-weight: 800;">
                                🏐 <span style="color: #daa520;">Mikey's</span> Beach Volleyball Tournament
                            </h1>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 40px;">
                            <div style="text-align: center; margin-bottom: 24px;">
                                <span style="font-size: 64px;">🤝</span>
                            </div>
                            <h2 style="margin: 0 0 8px 0; font-size: 26px; font-weight: 700; color: #111827; text-align: center;">
                                You've Been Invited!
                            </h2>
                            <p style="margin: 0 0 32px 0; font-size: 16px; color: #6b7280; text-align: center; line-height: 1.6;">
                                <strong style="color: #111827;">${data.captainName}</strong> wants you to join their volleyball team
                            </p>
                            <table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="background-color: #fef9e7; border: 2px solid #b8860b; border-radius: 12px; margin-bottom: 24px;">
                                <tr>
                                    <td style="padding: 24px; text-align: center;">
                                        <p style="margin: 0 0 4px 0; font-size: 13px; color: #92400e; text-transform: uppercase; letter-spacing: 0.05em; font-weight: 600;">
                                            Team
                                        </p>
                                        <p style="margin: 0 0 8px 0; font-size: 24px; font-weight: 800; color: #111827;">
                                            ${data.teamName}
                                        </p>
                                        <p style="margin: 0; font-size: 14px; color: #6b7280;">
                                            Captain: ${data.captainName}
                                        </p>
                                    </td>
                                </tr>
                            </table>
                            <table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="background-color: #f9fafb; border-radius: 12px; margin-bottom: 24px;">
                                <tr>
                                    <td style="padding: 24px;">
                                        <h3 style="margin: 0 0 16px 0; font-size: 13px; font-weight: 700; color: #6b7280; text-transform: uppercase; letter-spacing: 0.05em;">
                                            Event Details
                                        </h3>
                                        <table role="presentation" width="100%" cellspacing="0" cellpadding="0">
                                            <tr>
                                                <td style="padding: 6px 0;">
                                                    <span style="font-size: 15px; color: #111827;">📅 Saturday, March 21, 2026</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding: 6px 0;">
                                                    <span style="font-size: 15px; color: #111827;">⏰ 12 PM – 4 PM</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding: 6px 0;">
                                                    <span style="font-size: 15px; color: #111827;">📍 Great American Center (Aberdeen, NJ)</span>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                            <table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="margin-bottom: 32px;">
                                <tr>
                                    <td style="text-align: center;">
                                        <p style="margin: 0 0 4px 0; font-size: 14px; color: #6b7280;">
                                            Registration fee
                                        </p>
                                        <p style="margin: 0; font-size: 32px; font-weight: 800; color: #b8860b;">
                                            $120
                                        </p>
                                        <p style="margin: 4px 0 0 0; font-size: 13px; color: #6b7280;">
                                            Includes food, 2 drinks, swag & 4+ games
                                        </p>
                                    </td>
                                </tr>
                            </table>
                            <table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="margin-bottom: 24px;">
                                <tr>
                                    <td align="center">
                                        <a href="${data.joinUrl}" style="display: inline-block; padding: 18px 40px; background-color: #b8860b; color: #ffffff; text-decoration: none; font-size: 17px; font-weight: 700; border-radius: 10px;">
                                            Join ${data.teamName} →
                                        </a>
                                    </td>
                                </tr>
                            </table>
                            <p style="margin: 0; font-size: 13px; color: #9ca3af; text-align: center;">
                                Can't make it? No worries—just ignore this email.
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 0 40px 40px 40px;">
                            <table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="background-color: #f9fafb; border-radius: 12px;">
                                <tr>
                                    <td style="padding: 20px 24px;">
                                        <p style="margin: 0; font-size: 14px; color: #6b7280; line-height: 1.6;">
                                            <strong style="color: #111827;">About this event:</strong> This tournament honors Michael Williams—Mikey—and raises money for scholarships for creative students at RFH.
                                        </p>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td style="background-color: #111827; padding: 24px 40px; text-align: center;">
                            <p style="margin: 0 0 8px 0; color: #ffffff; font-size: 14px; font-weight: 600;">
                                Michael Williams Memorial Scholarship
                            </p>
                            <p style="margin: 0; color: #9ca3af; font-size: 13px;">
                                501(c)(3) Nonprofit • All proceeds fund scholarships
                            </p>
                        </td>
                    </tr>
                </table>
                <p style="margin: 24px 0 0 0; font-size: 12px; color: #9ca3af; text-align: center;">
                    Questions? Reply to this email or visit <a href="https://michaelwilliamsmemorialscholarship.com" style="color: #b8860b;">our website</a>
                </p>
            </td>
        </tr>
    </table>
</body>
</html>`;
}

serve(async (req) => {
  // Handle CORS preflight
  if (req.method === "OPTIONS") {
    return new Response("ok", { headers: corsHeaders });
  }

  try {
    const { type, to, data } = await req.json();

    if (!type || !to || !data) {
      return new Response(
        JSON.stringify({ error: "Missing required fields: type, to, data" }),
        { status: 400, headers: { ...corsHeaders, "Content-Type": "application/json" } }
      );
    }

    let html: string;
    let subject: string;

    if (type === "confirmation") {
      html = getConfirmationHtml(data);
      subject = "You're Registered! - Mikey's Beach Volleyball Tournament";
    } else if (type === "invite") {
      html = getInviteHtml(data);
      subject = `${data.captainName} invited you to join ${data.teamName}!`;
    } else {
      return new Response(
        JSON.stringify({ error: `Unknown email type: ${type}` }),
        { status: 400, headers: { ...corsHeaders, "Content-Type": "application/json" } }
      );
    }

    if (!RESEND_API_KEY) {
      console.log(`[send-email] No RESEND_API_KEY configured. Would send "${subject}" to ${to}`);
      return new Response(
        JSON.stringify({ success: true, message: "Email logged (no API key configured)" }),
        { headers: { ...corsHeaders, "Content-Type": "application/json" } }
      );
    }

    const res = await fetch("https://api.resend.com/emails", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
        Authorization: `Bearer ${RESEND_API_KEY}`,
      },
      body: JSON.stringify({
        from: FROM_EMAIL,
        to: [to],
        subject,
        html,
      }),
    });

    const resData = await res.json();

    if (!res.ok) {
      console.error("Resend API error:", resData);
      return new Response(
        JSON.stringify({ error: "Failed to send email", details: resData }),
        { status: 500, headers: { ...corsHeaders, "Content-Type": "application/json" } }
      );
    }

    return new Response(
      JSON.stringify({ success: true, id: resData.id }),
      { headers: { ...corsHeaders, "Content-Type": "application/json" } }
    );
  } catch (err) {
    console.error("send-email error:", err);
    return new Response(
      JSON.stringify({ error: err.message }),
      { status: 500, headers: { ...corsHeaders, "Content-Type": "application/json" } }
    );
  }
});
