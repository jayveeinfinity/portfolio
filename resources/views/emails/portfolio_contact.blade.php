<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Portfolio Contact</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 20px;">
    <div style="max-width: 600px; margin: 0 auto; background-color: white; padding: 30px; border-radius: 8px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
        <h2 style="color: #333; margin-top: 0; padding-bottom: 20px; border-bottom: 2px solid #e2e8f0;">New Signal Check (Portfolio)</h2>
        
        <div style="margin-top: 20px;">
            <p><strong>Alias:</strong> {{ $alias }}</p>
            <p><strong>Email Address:</strong> <a href="mailto:{{ $email }}">{{ $email }}</a></p>
            
            <h3 style="margin-top: 30px; color: #4a5568;">The Mission:</h3>
            <div style="background-color: #edf2f7; padding: 15px; border-radius: 6px; font-size: 15px; line-height: 1.6; color: #2d3748; white-space: pre-wrap;">
{{ $mission }}
            </div>
        </div>
        
        <div style="margin-top: 30px; padding-top: 20px; border-top: 1px solid #e2e8f0; font-size: 12px; color: #a0aec0; text-align: center;">
            This message was sent from your portfolio contact form.
        </div>
    </div>
</body>
</html>
