# redirect-by-ip-in-range
Simple redirection if user come from IP which withing the range.

## Usage

In your index.php (or another such file) insert first line after `<?php`

```
include_once 'redirect-by-ip-in-range.php';
```

### Edit `redirect-by-ip-in-range.php` 

1. Replace value `$redirect_url = 'redirect-to-domain';` by url where it should redirect users.
2. Provide array of ranges:
```
   $ranges = [
    '2.56.24.0:2.56.27.255', '2.56.88.0:2.56.91.255', '2.56.112.0:2.56.115.255'
    ];
```

`'2.56.24.0:2.56.27.255'` - range of IP from `2.56.24.0` to `2.56.27.255`.
