# License
- GPL-3.0

# Install
- `$ composer require kmvan/pinyin-service`

# Usage
- `$ php -S localhost:8000 -t ./`

And

```sh
curl --header "Content-Type: application/json" \
--request POST \
--data '["你好","我好","大家好"]' \
http://localhost:8000/
```

```json
// output json
{
    "你好": [
        "ni3",
        "hao3"
    ],
    "我好": [
        "wo3",
        "hao3"
    ],
    "大家好": [
        "da4",
        "jia1",
        "hao3"
    ]
}
```
